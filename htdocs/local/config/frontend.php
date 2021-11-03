<?php

$arLibs = [
		/*
		  'Название библиотеки' => array(
		  'js' => '', // Путь до библиотеки от корня сайта
		  'css' => '', // Путь до css файла библиотеки от корня сайта. Может быть массивом
		  'lang' => '', // Путь до обычного lang файла с php массивом, который будет транслирован в js
		  'rel' => '', // массив библиотек, от которых зависит данная библиотека
		  'use' => '', // CJSCore::USE_PUBLIC || CJSCore::USE_ADMIN,
		  'skip_core' => '', // отключает необходимость загрузки ядра JS битрикс
		  'lang_additional' => '', // Путь до дополнительного lang файла с php массивом, который будет транслирован в js
		  )
		 */

//		'more_button' => [
//				'js'		 => '/local/frontend/more_button/script.js',
//				'use'		 => \CJSCore::USE_PUBLIC,
//				'skip_core'	 => false,
//		]
];

foreach ($arLibs as $sLibName => $arLib) {
	if (!isset($arLib['skip_core'])) {
		$arLib['skip_core'] = true;
	}

	// Проверка на имя из ядра. Не будем давать подключать библиотеку с неправильным именем
	// чтобы имя всегда соответствовало ключу массива, иначе битрикс его подменит,
	// сделав удаление всех неугодных ему символов
	if (!preg_match('~[a-z0-9_]+~', $sLibName)) {
		throw new \Exception('Попытка зарегистрировать библиотеку с некорректным именем - \'' . $sLibName . '\'');
	}

	if (strlen($arLib['js']) === 0) {
		throw new \Exception('Попытка зарегистрировать библиотеку без js файла - \'' . $sLibName . '\'');
	}

	\CJSCore::RegisterExt($sLibName, $arLib);
}
