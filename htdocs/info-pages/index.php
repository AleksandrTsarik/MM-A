<?

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
$APPLICATION->SetTitle('');
$APPLICATION->SetPageProperty('title_css_class_ex', 'b-title-simple');
$APPLICATION->SetPageProperty('NOT_SHOW_NAV_CHAIN', 'Y');

use \Bitrix\Iblock\Elements\ElementInfoPagesRuTable;
use \Bitrix\Main\Loader;
use \Ms\Main\Localization\Helper;

Loader::includeModule('iblock');

$APPLICATION->IncludeComponent('bitrix:news', 'info_pages',
	[
			'ADD_ELEMENT_CHAIN'					 => 'N',
			'ADD_SECTIONS_CHAIN'				 => 'Y',
			'AJAX_MODE'							 => 'N',
			'AJAX_OPTION_ADDITIONAL'			 => '',
			'AJAX_OPTION_HISTORY'				 => 'N',
			'AJAX_OPTION_JUMP'					 => 'N',
			'AJAX_OPTION_STYLE'					 => 'N',
			'BROWSER_TITLE'						 => '-',
			'CACHE_FILTER'						 => 'N',
			'CACHE_GROUPS'						 => 'N',
			'CACHE_TIME'						 => '36000',
			'CACHE_TYPE'						 => 'A',
			'CHECK_DATES'						 => 'Y',
			'DETAIL_ACTIVE_DATE_FORMAT'			 => 'd.m.Y',
			'DETAIL_DISPLAY_BOTTOM_PAGER'		 => 'N',
			'DETAIL_DISPLAY_TOP_PAGER'			 => 'N',
			'DETAIL_FIELD_CODE'					 => [
			],
			'DETAIL_PAGER_SHOW_ALL'				 => 'N',
			'DETAIL_PAGER_TEMPLATE'				 => '',
			'DETAIL_PAGER_TITLE'				 => 'Страница',
			'DETAIL_PROPERTY_CODE'				 => [
			],
			'DETAIL_SET_CANONICAL_URL'			 => 'N',
			'DISPLAY_AS_RATING'					 => 'rating',
			'DISPLAY_BOTTOM_PAGER'				 => 'N',
			'DISPLAY_DATE'						 => 'N',
			'DISPLAY_NAME'						 => 'N',
			'DISPLAY_PICTURE'					 => 'N',
			'DISPLAY_PREVIEW_TEXT'				 => 'N',
			'DISPLAY_TOP_PAGER'					 => 'N',
			'FONT_MAX'							 => '50',
			'FONT_MIN'							 => '10',
			'FORUM_ID'							 => '',
			'HIDE_LINK_WHEN_NO_DETAIL'			 => 'N',
			'IBLOCK_ID'							 => Helper::getIblockIdByEntityClass(ElementInfoPagesRuTable::class),
			'IBLOCK_TYPE'						 => Helper::getIblockType('content_ru'),
			'INCLUDE_IBLOCK_INTO_CHAIN'			 => 'N',
			'INCLUDE_SUBSECTIONS'				 => 'N',
			'LIST_ACTIVE_DATE_FORMAT'			 => 'd.m.Y',
			'LIST_FIELD_CODE'					 => [
					'DETAIL_TEXT'
			],
			'LIST_PROPERTY_CODE'				 => [
					'BLOCK_STRING',
					'BLOCK_HTML',
					'BLOCK_FILE',
			],
			'MAX_VOTE'							 => '5',
			'MESSAGES_PER_PAGE'					 => '10',
			'MESSAGE_404'						 => '',
			'META_DESCRIPTION'					 => '-',
			'META_KEYWORDS'						 => '-',
			'NEWS_COUNT'						 => '20',
			'PAGER_BASE_LINK_ENABLE'			 => 'N',
			'PAGER_DESC_NUMBERING'				 => 'N',
			'PAGER_DESC_NUMBERING_CACHE_TIME'	 => '36000',
			'PAGER_SHOW_ALL'					 => 'N',
			'PAGER_SHOW_ALWAYS'					 => 'N',
			'PAGER_TEMPLATE'					 => '.default',
			'PAGER_TITLE'						 => 'Новости',
			'PATH_TO_SMILE'						 => '/bitrix/images/forum/smile/',
			'PERIOD_NEW_TAGS'					 => '',
			'PREVIEW_TRUNCATE_LEN'				 => '',
			'REVIEW_AJAX_POST'					 => 'Y',
			'SEF_FOLDER'						 => SITE_DIR,
			'SEF_MODE'							 => 'Y',
			'SEF_URL_TEMPLATES'					 => [
					'news'		 => '',
					'detail'	 => '',
					'section'	 => '#SECTION_CODE_PATH#/'
			],
			'SET_LAST_MODIFIED'					 => 'Y',
			'SET_STATUS_404'					 => 'Y',
			'SET_TITLE'							 => 'N',
			'SET_BROWSER_TITLE'					 => 'N',
			'SET_KEYWORDS'						 => 'Y',
			'SET_DESCRIPTION'					 => 'Y',
			'SHOW_404'							 => 'Y',
			'SHOW_LINK_TO_FORUM'				 => 'N',
			'SORT_BY1'							 => 'SORT',
			'SORT_ORDER1'						 => 'ASC',
			'SORT_BY2'							 => 'ID',
			'SORT_ORDER2'						 => 'ASC',
			'STRICT_SECTION_CHECK'				 => 'N',
			'TAGS_CLOUD_ELEMENTS'				 => '150',
			'TAGS_CLOUD_WIDTH'					 => '100%',
			'URL_TEMPLATES_READ'				 => '',
			'USE_CAPTCHA'						 => 'N',
			'USE_CATEGORIES'					 => 'N',
			'USE_FILTER'						 => 'N',
			'USE_PERMISSIONS'					 => 'N',
			'USE_RATING'						 => 'N',
			'USE_REVIEW'						 => 'N',
			'USE_RSS'							 => 'N',
			'USE_SEARCH'						 => 'N',
			'USE_SHARE'							 => 'N',
	]
);

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php');
