<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
	die();
}

use \Bitrix\Main\Context;
use \Bitrix\Main\Web\HttpClient;
use \Bitrix\Main\Web\Json;
use \Ms\Rest\Base;
use \Ms\Rest\HttpStatus;

$request = Context::getCurrent()->getRequest();
$response = Context::getCurrent()->getResponse();

//
$page = str_replace('index.php', '', $request->getRequestedPage());

if (!preg_match('#^\/api\/v\d{1,}\/(?P<entity>[a-z0-9\.]+)\/?(?P<id>[a-zA-Z0-9\-_\/]*)?#', $page, $arMatches)) {
	$response->setStatus(HttpStatus::STATUS_418);
	throw new Exception('Не корректные параметры запроса.');
}

$arMatches['id'] = trim($arMatches['id'], '/');

$method = $request->getRequestMethod();
$class = '\\ms\\rest\\' . str_replace('.', '\\', $arMatches['entity']);
$id = $arMatches['id'] ? explode('/', $arMatches['id']) : null;
$params = null;
$data = null;

if (is_array($id) && count($id) === 1) {
	$id = reset($id);
}

if ($method === HttpClient::HTTP_GET || $method === HttpClient::HTTP_HEAD) {
	$params = $request->getQueryList()->toArray();
} else {
	try {
		$data = $request->getInput() ? Json::decode($request->getInput()) : null;

		if ($request->getFileList()->count() > 0) {
			$data = array_merge($data !== null ?: [
				], $request->getFileList()->toArray()
			);
		}
	} catch (Exception $ex) {
		$response->setStatus(HttpStatus::STATUS_415);
		throw new Exception('Не корректные данные запроса.');
	}
}

if (!class_exists($class)) {
	$response->setStatus(HttpStatus::STATUS_418);
	throw new Exception('Исполняемый класс API не найден.');
} elseif (!in_array(strtolower($method), array_map('strtolower', get_class_methods($class)))) {
	$response->setStatus(HttpStatus::STATUS_501);
	throw new Exception('Вызываемый метод не реализован.');
}

try {
	$object = new $class($id, $data, $params);
} catch (Exception $e) {
	$response->setStatus(HttpStatus::STATUS_500);
	throw new Exception($e->getMessage());
}

if ($object instanceof Base !== true) {
	$response->setStatus(HttpStatus::STATUS_418);
	throw new Exception('Исполняемый класс API запрещён.');
} elseif (!$object->checkRights($method)) {
	$response->setStatus(HttpStatus::STATUS_403);
	throw new Exception('Не достаточно прав для выполнения текущей операции.');
} elseif (!$object->checkDataStructure($method)) {
	$response->setStatus(HttpStatus::STATUS_422);
	throw new Exception('Не корректная структура данных.');
}

try {
	$result = $object->{$method}();
} catch (Exception $e) {
	$response->setStatus(HttpStatus::STATUS_500);
	throw new Exception($e->getMessage());
}

return $result;
