<?

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
	die();
}

//
$arPropsCodesForFix = [
		'BLOCK_STRING',
		'BLOCK_HTML',
		'BLOCK_FILE',
];

foreach ($arResult['ITEMS'] as &$arItem) {
	// поправим косяк битрикса для множественных свойств при 1 и 2+ значениях
	foreach ($arPropsCodesForFix as $propCode) {
		if (count($arItem['DISPLAY_PROPERTIES'][$propCode]['PROPERTY_VALUE_ID']) === 1) {
			$arItem['DISPLAY_PROPERTIES'][$propCode]['DISPLAY_VALUE'] = [$arItem['DISPLAY_PROPERTIES'][$propCode]['DISPLAY_VALUE']];
		}
	}

	// собираем контент для замены
	$arReplacementContent = [];

	foreach ($arItem['DISPLAY_PROPERTIES']['BLOCK_STRING']['DISPLAY_VALUE'] as $arValue) {
		if (!empty($arValue['SUB_VALUES']['BLOCK_STRING_CONTENT']['VALUE'])) {
			$index = $arValue['SUB_VALUES']['BLOCK_STRING_INDEX']['VALUE'];
			$arReplacementContent["string_{$index}"] = $arValue['SUB_VALUES']['BLOCK_STRING_CONTENT']['~VALUE'];
		}
	}

	foreach ($arItem['DISPLAY_PROPERTIES']['BLOCK_HTML']['DISPLAY_VALUE'] as $arValue) {
		if (!empty($arValue['SUB_VALUES']['BLOCK_HTML_CONTENT']['VALUE'])) {
			$index = $arValue['SUB_VALUES']['BLOCK_HTML_INDEX']['VALUE'];
			$arReplacementContent["html_{$index}"] = $arValue['SUB_VALUES']['BLOCK_HTML_CONTENT']['~VALUE']['TEXT'];
		}
	}

	foreach ($arItem['DISPLAY_PROPERTIES']['BLOCK_FILE']['DISPLAY_VALUE'] as $arValue) {
		if (!empty($arValue['SUB_VALUES']['BLOCK_FILE_CONTENT']['FILE_VALUE'])) {
			$index = $arValue['SUB_VALUES']['BLOCK_FILE_INDEX']['VALUE'];
			$arReplacementContent["file_src_{$index}"] = $arValue['SUB_VALUES']['BLOCK_FILE_CONTENT']['FILE_VALUE']['SRC'];
		}
	}

	// заменяем в шаблоне страницы
	if (preg_match_all('/(?:\{=((?:string|html|file_src)_(?:\d{1,}))\})/', $arItem['DETAIL_TEXT'], $arMatches, PREG_SET_ORDER)) {
		foreach ($arMatches as $arMatch) {
			list($match, $replace) = $arMatch;

			$arItem['DETAIL_TEXT'] = str_replace($match, $arReplacementContent[$replace] ? : '', $arItem['DETAIL_TEXT']);
		}
	}
}

unset($arItem, $template);
