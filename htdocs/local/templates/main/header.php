<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}

use \Bitrix\Main\Page\Asset;
use \Ms\Main\Localization\Helper;

$asset = Asset::getInstance();

// css
//$asset->addCss('/front/css/main.css');
// js
//$asset->addJs('/front/js/jquery-3.5.1.min.js');
?><!DOCTYPE html>
<html xml:lang="<? echo Helper::getLanguage(); ?>" lang="<? echo Helper::getLanguage(); ?>">
	<head>
		<?
		$APPLICATION->ShowHead();

		Analytics::includeGoogleAnalytics();
		?>

		<title><? $APPLICATION->ShowTitle(''); ?></title>
	</head>
	<body>

		<? $APPLICATION->ShowPanel(); ?>
		<?
		