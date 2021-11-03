<?php

namespace Ms\Rest\Form;

use \Bitrix\Iblock\Elements\ElementFeedbackFormTable;
use \Bitrix\Main\Error;
use \Bitrix\Main\Loader;
use \Ms\Main\Helper;
use \Ms\Rest\Base;
use \Ms\Rest\HttpStatus;
use \Ms\Rest\Result;
use \Ms\Rest\Traits\Checker;

class Feedback extends Base {

	use Checker;

	/** @var Result */
	protected $result;

	public function post()
	{
		$this->result = new Result();

		if (empty($this->id)) {
			$this->postForEmptyId();
		} else {
			$this->result->addError(new Error('Вызываемый метод не реализован.'))
				->setStatus(HttpStatus::STATUS_501)
				->setResponseType(Result::RESPONSE_TYPE_TEXT)
			;
		}

		return $this->result;
	}

	protected function postForEmptyId()
	{
		$this->checkFieldsFromPost();

		if (!$this->result->isSuccess()) {
			return;
		}

		Loader::includeModule('iblock');

		$result = ElementFeedbackFormTable::createObject()
			->setName(time())
			->setFio($this->data['fio'])
			->setPhone(Helper::formatPhone7($this->data['phone']))
			->setEmail($this->data['email'])
			->setMessage($this->data['message'])
			->save()
		;

		if ($result->isSuccess()) {
			$this->result->setData([
						'id' => $result->getId(),
				])
				->setStatus(HttpStatus::STATUS_201)
			;
		} else {
			$this->result->addError(new Error(join("\n", $result->getErrorMessages())))
				->setStatus(HttpStatus::STATUS_500)
				->setResponseType(Result::RESPONSE_TYPE_TEXT)
			;
		}
	}

	protected function checkFieldsFromPost()
	{
		$result = static::checkRequiredFields([
					'fio',
					'phone',
				], $this->data
		);

		if ($result->isSuccess()) {
			if (!static::checkPhoneField($this->data['phone'])) {
				$result->addError(new Error('Не корректный номер телефона.', 'phone'));
			}

			if (!static::checkEmailField($this->data['email'])) {
				$result->addError(new Error('Не корректный email.', 'email'));
			}
		}

		if (!$result->isSuccess()) {
			$this->result->addErrors($result->getErrors())
				->setStatus(HttpStatus::STATUS_422)
			;
		}
	}

	protected function getDataStructure($method)
	{
		switch (strtolower($method)) {
			case 'post':
				return [
						'fio'		 => '',
						'phone'		 => '',
						'email'		 => '',
						'message'	 => '',
				];
		}

		return parent::getDataStructure($method);
	}

}
