<?

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
	die();
}

use \Bitrix\Iblock\Component\Tools;
use \Bitrix\Main\Context;

if (Context::getCurrent()->getRequest()->getRequestedPage() !== '/404.php') {
	Tools::process404('', true, true, true);
}
