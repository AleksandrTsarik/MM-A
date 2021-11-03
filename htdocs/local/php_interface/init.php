<?php

use \Bitrix\Main\Application;
use \Bitrix\Main\Loader;

$documentRoot = Application::getDocumentRoot();

Loader::registerAutoLoadClasses(null,
	[
			'\CIBlockTools'					 => '/local/backend/iblock_tools/iblockTools.php',
			/** Main */
			'\Ms\Main\HelperBase'			 => '/local/classes/main/helper_base.php',
			'\Ms\Main\Helper'				 => '/local/classes/main/helper.php',
			'\Ms\Main\Localization\Helper'	 => '/local/classes/main/localization/helper.php',
			/** Rest */
			'\Ms\Rest\TChecker'				 => '/local/classes/rest/traits/tchecker.php',
			'\Ms\Rest\Base'					 => '/local/classes/rest/base.php',
			'\Ms\Rest\Result'				 => '/local/classes/rest/result.php',
			'\Ms\Rest\HttpStatus'			 => '/local/classes/rest/http_status.php',
			'\Ms\Rest\Form\Product'			 => '/local/classes/rest/v1/form/product.php',
	]
);

// подключаем константы
require($documentRoot . '/local/config/const.php');

// подключаем js библиотеки
require($documentRoot . '/local/config/frontend.php');

// подключаем события
require($documentRoot . '/local/config/events.php');
