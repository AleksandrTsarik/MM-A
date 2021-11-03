<?php

use \Bitrix\Iblock\Elements\ElementFeedbackFormTable;
use \Bitrix\Main\EventManager;
use \Bitrix\Main\Loader;
use \Bitrix\Main\ORM\Data\DataManager;

$eventManager = EventManager::getInstance();

Loader::includeModule('iblock');

//// отправка письма при заполнении формы
//$eventManager->addEventHandler(
//	'iblock', ElementFeedbackFormTable::getEntity()->getFullName() . '::' . DataManager::EVENT_ON_AFTER_ADD,
//	[
//			'\Ms\Iblock\Handlers',
//			'sendEmail'
//	]
//);
