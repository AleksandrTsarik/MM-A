<?

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
	die();
}

use \Ms\Main\Helper;

//
foreach ($arResult['SECTIONS'] as $arSection) {
	if ($arParams['SELECTED_SECTION_ID'] == $arSection['ID']) {
		$arResult['SECTION'] = $arSection;
		break;
	}
}

//
$arResult['SHOW_MENU'] = false;
$arResult['MENU'] = [
	];

if ($arResult['SECTION']['UF_ALIGNMENT_H1'] > 0) {
	$arResult['SECTION']['UF_ALIGNMENT_H1'] = Helper::getUfEnumXmlIdById($arResult['SECTION']['UF_ALIGNMENT_H1']);
}

if ($arResult['SECTION']['UF_ALIGNMENT_H1'] == 'align_h1_center_with_menu') {
	$arResult['SHOW_MENU'] = true;
	$arResult['MENU'] = array_filter($arResult['SECTIONS'],
		function ($arSection) use($arResult) {
		return $arSection['IBLOCK_SECTION_ID'] > 0 && $arSection['IBLOCK_SECTION_ID'] == $arResult['SECTION']['IBLOCK_SECTION_ID'];
	});
}

$arResult['SECTIONS_COUNT'] = count($arResult['MENU']);
