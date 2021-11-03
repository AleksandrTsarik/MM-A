<?

include_once(realpath($_SERVER["DOCUMENT_ROOT"] . '/bitrix/modules/main/include/prolog_before.php'));

use \Bitrix\Main\Application;
use \Bitrix\Main\Context;
use \Bitrix\Main\Web\HttpClient;
use \Bitrix\Main\Web\Json;
use \Ms\Rest\HttpStatus;
use \Ms\Rest\Result;

$request = Context::getCurrent()->getRequest();
$response = Context::getCurrent()->getResponse();
$version = null;

if (preg_match('#^\/api\/v(?P<ver>\d{1,})\/.+$#', $request->getRequestedPage(), $arMatches)) {
	$version = $arMatches['ver'];
}

$filePath = Application::getDocumentRoot() . "/local/api/v{$version}.php";

try {
	// проверка ошибок
	if ($version < 1) {
		$response->setStatus(HttpStatus::STATUS_418);
		throw new Exception('Вызываемая версия API не поддерживается.');
	}

	if (strpos($request->getHeader('Accept'), 'application/json') === false) {
		$response->setStatus(HttpStatus::STATUS_415);
		throw new Exception('Не корректный заголовок \'Accept\'.');
	}

	if (!file_exists($filePath)) {
		$response->setStatus(HttpStatus::STATUS_418);
		throw new Exception('Исполняемый файл API не найден..');
	}

	// подключение исполняемого файла
	$result = include_once $filePath;

	// проверка формата результата
	if ($result instanceof Result === false) {
		$response->setStatus(HttpStatus::STATUS_500);
		throw new Exception('Ошибка формата результата.');
	}

	// вывод результата
	$GLOBALS['APPLICATION']->RestartBuffer();
	$outputContent = null;

	if ($result->isSuccess()) {
		if ($request->getRequestMethod() === HttpClient::HTTP_GET || $request->getRequestMethod() === HttpClient::HTTP_HEAD) {
			header('Cache-Control: no-store, no-cache, must-revalidate');
			header('Pragma: no-cache');
		}

		if ($result->getData() !== null) {
			$outputContent = $result->getData();
		}
	} else {
		foreach ($result->getErrors() as $error) {
			$outputContent[] = [
					'code'		 => $error->getCode(),
					'message'	 => $error->getMessage(),
			];
		}
	}

	if ($result->getStatus()) {
		$response->setStatus($result->getStatus());
	}

	if ($result->getResponseType() === Result::RESPONSE_TYPE_TEXT) {
		header('Content-type: text/plain; charset=UTF-8');
		echo is_array($outputContent) ? join("\n", array_column($outputContent, 'message')) : $outputContent;
	} elseif ($outputContent !== null) {
		header('Content-type: application/json; charset=UTF-8');
		echo Json::encode($outputContent);
	}
} catch (Exception $error) {
	$GLOBALS['APPLICATION']->RestartBuffer();
	header('Content-type: text/plain; charset=UTF-8');
	echo $error->getMessage();
}

include_once(Application::getDocumentRoot() . '/bitrix/modules/main/include/epilog_after.php');
