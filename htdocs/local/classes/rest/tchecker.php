<?php

namespace Ms\Rest;

use \Bitrix\Main\Config\Option;
use \Bitrix\Main\Context;
use \Bitrix\Main\Error;
use \Bitrix\Main\Result;
use \Google\ReCaptcha;
use \Ms\Main\Helper;

trait TChecker {

	/**
	 * @param array $arRequiredFields
	 * @param array $arFieldValues
	 * @return Result
	 */
	protected static function checkRequiredFields(array $arRequiredFields, array $arFieldValues)
	{
		$result = new Result();

		foreach ($arRequiredFields as $requiredField) {
			if (!isset($arFieldValues[$requiredField]) || !$arFieldValues[$requiredField]) {
				$result->addError(new Error('Не заполнено обязательное поле.', $requiredField));
			}
		}

		return $result;
	}

	/**
	 * @param string $email
	 * @return boolean
	 */
	protected static function checkEmailField($email)
	{
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}

	protected static function checkPhoneField($phone)
	{
		$phoneFormat = Helper::formatPhone($phone);
		return strlen($phoneFormat) === 10 && strpos($phoneFormat, '9') === 0;
	}

	/**
	 * @param string $reCaptchaResponse
	 * @return boolean
	 */
	protected static function checkReCaptcha($reCaptchaResponse)
	{
		if ($reCaptchaResponse && Option::get('ms', 'google_recaptcha_key_secret', '')) {
			$reCaptcha = new ReCaptcha(Option::get('ms', 'google_recaptcha_key_secret', ''));

			$response = $reCaptcha->verifyResponse(
				Context::getCurrent()->getServer()->get('REMOTE_ADDR'), $reCaptchaResponse
			);

			if (is_null($response) || !$response->success) {
				return false;
			}
		} else {
			return false;
		}

		return true;
	}

	/**
	 * @param array $arFile
	 * @param array $arAllowedTypes
	 * @param int $maxSize
	 * @return Result
	 */
	protected static function checkFileField(array $arFile, array $arAllowedTypes = [], $maxSize = 0)
	{
		$result = new Result();

		if ($arFile['error'] > 0) {
			$result->addError(new Error('Ошибка при загрузке файла.'));
		} elseif (!empty($arAllowedTypes) && !in_array($arFile['type'], $arAllowedTypes)) {
			$result->addError(new Error('Недопустимый тип файла.'));
		} elseif ($maxSize > 0 && $arFile['size'] > $maxSize) {
			$size = $maxSize < 1024 * 1024 ? round($maxSize / 1024) . ' Кб' : round($maxSize / (1024 * 1024)) . ' Мб';
			$result->addError(new Error("Объем файла должен быть не более {$size}."));
		}

		return $result;
	}

	protected static function checkDateTimeField($datetime)
	{
		return (bool) strtotime($datetime);
	}

}
