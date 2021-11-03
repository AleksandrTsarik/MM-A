<?

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
	die();
}

// meta
if (!empty($arResult['IPROPERTY_VALUES'])) {
	$GLOBALS['APPLICATION']->SetTitle($arResult['IPROPERTY_VALUES']['SECTION_META_TITLE']);
	$GLOBALS['APPLICATION']->SetPageProperty('title',$arResult['IPROPERTY_VALUES']['SECTION_PAGE_TITLE']);

	if ($arResult['IPROPERTY_VALUES']['SECTION_META_TITLE']) {
		$GLOBALS['APPLICATION']->SetPageProperty('og:title', $arResult['IPROPERTY_VALUES']['SECTION_META_TITLE']);
	}

	if ($arResult['IPROPERTY_VALUES']['SECTION_META_DESCRIPTION']) {
		$GLOBALS['APPLICATION']->SetPageProperty('og:description', $arResult['IPROPERTY_VALUES']['SECTION_META_DESCRIPTION']);
	}
}
