<?php

namespace Ms\Rest;

use \Bitrix\Main\Error;
use \Bitrix\Main\Result as BxResult;

class Result extends BxResult {

	const RESPONSE_TYPE_JSON = 'json';
	const RESPONSE_TYPE_TEXT = 'text';

	/** @var  array|null */
	protected $data = null;

	/** @var  string */
	protected $status = HttpStatus::STATUS_200;

	/** @var  string */
	protected $responseType = self::RESPONSE_TYPE_JSON;

	public function getStatus()
	{
		return $this->status;
	}

	public function setStatus($status)
	{
		$this->status = $status;
		return $this;
	}

	public function getResponseType()
	{
		return $this->responseType;
	}

	public function setResponseType($responseType)
	{
		if ($responseType !== static::RESPONSE_TYPE_TEXT) {
			$this->responseType = static::RESPONSE_TYPE_JSON;
		} else {
			$this->responseType = static::RESPONSE_TYPE_TEXT;
		}

		return $this;
	}

	public function addError(Error $error)
	{
		if (strpos($this->status, '2') === 0) {
			$this->status = HttpStatus::STATUS_400;
		}

		return parent::addError($error);
	}

	public function addErrors(array $errors)
	{
		if (strpos($this->status, '2') === 0) {
			$this->status = HttpStatus::STATUS_400;
		}

		return parent::addErrors($errors);
	}

}
