<?

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
	die();
}

use \Bitrix\Iblock\Component\Tools;

//
switch ($arResult['SECTION']['UF_ALIGNMENT_H1']) {
	case 'align_h1_center':
		$APPLICATION->SetPageProperty('title_css_class_ex', 'b-title-simple b-title-simple--centered-title b-title-simple--wide');
		$APPLICATION->SetPageProperty('description_ex', $arResult['SECTION']['~DESCRIPTION']);
		break;

	case 'align_h1_center_with_menu':
		if ($arResult['SECTIONS_COUNT'] > 0) {
			$APPLICATION->SetPageProperty('title_css_class_ex', 'b-title-simple b-title-simple--centered-title b-title-simple--with-subnav');
			$APPLICATION->SetPageProperty('description_ex_css_class', 'b-title-subnav');
			$APPLICATION->SetPageProperty('description_ex', $APPLICATION->GetViewContent('description_ex'));
		}

		break;

	default:
		$APPLICATION->SetPageProperty('title_css_class_ex', 'b-title-simple');
		$APPLICATION->SetPageProperty('description_ex', $arResult['SECTION']['~DESCRIPTION']);
}

// 404, если выбранный раздел не активен
if ($arParams['SELECTED_SECTION_ID'] > 0 && $arResult['SECTION']['ID'] === 0) {
	Tools::process404('', true, true, true);
}
