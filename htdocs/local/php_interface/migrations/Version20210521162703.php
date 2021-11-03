<?php

namespace Sprint\Migration;

class Version20210521162703 extends Version {

	protected $description = "Добавлен ИБ \"Информационные страницы\" (en)";
	protected $moduleVersion = "3.22.2";

	/**
	 * @throws Exceptions\HelperException
	 * @return bool|void
	 */
	public function up()
	{
		$helper = $this->getHelperManager();
		$helper->Iblock()->saveIblockType(array(
				'ID'				 => 'content_en',
				'SECTIONS'			 => 'Y',
				'EDIT_FILE_BEFORE'	 => '',
				'EDIT_FILE_AFTER'	 => '',
				'IN_RSS'			 => 'N',
				'SORT'				 => '120',
				'LANG'				 =>
				array(
						'ru' =>
						array(
								'NAME'			 => 'Контент (en)',
								'SECTION_NAME'	 => '',
								'ELEMENT_NAME'	 => '',
						),
						'en' =>
						array(
								'NAME'			 => 'Контент (en)',
								'SECTION_NAME'	 => '',
								'ELEMENT_NAME'	 => '',
						),
				),
		));
		$iblockId = $helper->Iblock()->saveIblock(array(
				'IBLOCK_TYPE_ID'	 => 'content_en',
				'LID'				 =>
				array(
						0 => 's1',
				),
				'CODE'				 => 'info_pages_en',
				'API_CODE'			 => 'InfoPagesEn',
				'NAME'				 => 'Информационные страницы',
				'ACTIVE'			 => 'Y',
				'SORT'				 => '10',
				'LIST_PAGE_URL'		 => '/',
				'DETAIL_PAGE_URL'	 => '',
				'SECTION_PAGE_URL'	 => '/#SECTION_CODE_PATH#/',
				'CANONICAL_PAGE_URL' => '',
				'PICTURE'			 => NULL,
				'DESCRIPTION'		 => '',
				'DESCRIPTION_TYPE'	 => 'text',
				'RSS_TTL'			 => '24',
				'RSS_ACTIVE'		 => 'Y',
				'RSS_FILE_ACTIVE'	 => 'N',
				'RSS_FILE_LIMIT'	 => NULL,
				'RSS_FILE_DAYS'		 => NULL,
				'RSS_YANDEX_ACTIVE'	 => 'N',
				'XML_ID'			 => NULL,
				'INDEX_ELEMENT'		 => 'N',
				'INDEX_SECTION'		 => 'Y',
				'WORKFLOW'			 => 'N',
				'BIZPROC'			 => 'N',
				'SECTION_CHOOSER'	 => 'L',
				'LIST_MODE'			 => '',
				'RIGHTS_MODE'		 => 'S',
				'SECTION_PROPERTY'	 => 'Y',
				'PROPERTY_INDEX'	 => 'N',
				'VERSION'			 => '1',
				'LAST_CONV_ELEMENT'	 => '0',
				'SOCNET_GROUP_ID'	 => NULL,
				'EDIT_FILE_BEFORE'	 => '',
				'EDIT_FILE_AFTER'	 => '',
				'SECTIONS_NAME'		 => 'Разделы',
				'SECTION_NAME'		 => 'Раздел',
				'ELEMENTS_NAME'		 => 'Элементы',
				'ELEMENT_NAME'		 => 'Элемент',
				'EXTERNAL_ID'		 => NULL,
				'LANG_DIR'			 => '/',
				'ELEMENT_ADD'		 => 'Добавить элемент',
				'ELEMENT_EDIT'		 => 'Изменить элемент',
				'ELEMENT_DELETE'	 => 'Удалить элемент',
				'SECTION_ADD'		 => 'Добавить раздел',
				'SECTION_EDIT'		 => 'Изменить раздел',
				'SECTION_DELETE'	 => 'Удалить раздел',
		));
		$helper->Iblock()->saveIblockFields($iblockId,
			array(
					'IBLOCK_SECTION'			 =>
					array(
							'NAME'			 => 'Привязка к разделам',
							'IS_REQUIRED'	 => 'N',
							'DEFAULT_VALUE'	 =>
							array(
									'KEEP_IBLOCK_SECTION_ID' => 'N',
							),
					),
					'ACTIVE'					 =>
					array(
							'NAME'			 => 'Активность',
							'IS_REQUIRED'	 => 'Y',
							'DEFAULT_VALUE'	 => 'Y',
					),
					'ACTIVE_FROM'				 =>
					array(
							'NAME'			 => 'Начало активности',
							'IS_REQUIRED'	 => 'N',
							'DEFAULT_VALUE'	 => '',
					),
					'ACTIVE_TO'					 =>
					array(
							'NAME'			 => 'Окончание активности',
							'IS_REQUIRED'	 => 'N',
							'DEFAULT_VALUE'	 => '',
					),
					'SORT'						 =>
					array(
							'NAME'			 => 'Сортировка',
							'IS_REQUIRED'	 => 'N',
							'DEFAULT_VALUE'	 => '0',
					),
					'NAME'						 =>
					array(
							'NAME'			 => 'Название',
							'IS_REQUIRED'	 => 'Y',
							'DEFAULT_VALUE'	 => '',
					),
					'PREVIEW_PICTURE'			 =>
					array(
							'NAME'			 => 'Картинка для анонса',
							'IS_REQUIRED'	 => 'N',
							'DEFAULT_VALUE'	 =>
							array(
									'FROM_DETAIL'				 => 'N',
									'SCALE'						 => 'N',
									'WIDTH'						 => '',
									'HEIGHT'					 => '',
									'IGNORE_ERRORS'				 => 'N',
									'METHOD'					 => 'resample',
									'COMPRESSION'				 => 85,
									'DELETE_WITH_DETAIL'		 => 'N',
									'UPDATE_WITH_DETAIL'		 => 'N',
									'USE_WATERMARK_TEXT'		 => 'N',
									'WATERMARK_TEXT'			 => '',
									'WATERMARK_TEXT_FONT'		 => '',
									'WATERMARK_TEXT_COLOR'		 => '',
									'WATERMARK_TEXT_SIZE'		 => '',
									'WATERMARK_TEXT_POSITION'	 => 'tl',
									'USE_WATERMARK_FILE'		 => 'N',
									'WATERMARK_FILE'			 => '',
									'WATERMARK_FILE_ALPHA'		 => '',
									'WATERMARK_FILE_POSITION'	 => 'tl',
									'WATERMARK_FILE_ORDER'		 => NULL,
							),
					),
					'PREVIEW_TEXT_TYPE'			 =>
					array(
							'NAME'			 => 'Тип описания для анонса',
							'IS_REQUIRED'	 => 'Y',
							'DEFAULT_VALUE'	 => 'text',
					),
					'PREVIEW_TEXT'				 =>
					array(
							'NAME'			 => 'Описание для анонса',
							'IS_REQUIRED'	 => 'N',
							'DEFAULT_VALUE'	 => '',
					),
					'DETAIL_PICTURE'			 =>
					array(
							'NAME'			 => 'Детальная картинка',
							'IS_REQUIRED'	 => 'N',
							'DEFAULT_VALUE'	 =>
							array(
									'SCALE'						 => 'N',
									'WIDTH'						 => '',
									'HEIGHT'					 => '',
									'IGNORE_ERRORS'				 => 'N',
									'METHOD'					 => 'resample',
									'COMPRESSION'				 => 85,
									'USE_WATERMARK_TEXT'		 => 'N',
									'WATERMARK_TEXT'			 => '',
									'WATERMARK_TEXT_FONT'		 => '',
									'WATERMARK_TEXT_COLOR'		 => '',
									'WATERMARK_TEXT_SIZE'		 => '',
									'WATERMARK_TEXT_POSITION'	 => 'tl',
									'USE_WATERMARK_FILE'		 => 'N',
									'WATERMARK_FILE'			 => '',
									'WATERMARK_FILE_ALPHA'		 => '',
									'WATERMARK_FILE_POSITION'	 => 'tl',
									'WATERMARK_FILE_ORDER'		 => NULL,
							),
					),
					'DETAIL_TEXT_TYPE'			 =>
					array(
							'NAME'			 => 'Тип детального описания',
							'IS_REQUIRED'	 => 'Y',
							'DEFAULT_VALUE'	 => 'html',
					),
					'DETAIL_TEXT'				 =>
					array(
							'NAME'			 => 'Детальное описание',
							'IS_REQUIRED'	 => 'Y',
							'DEFAULT_VALUE'	 => '',
					),
					'XML_ID'					 =>
					array(
							'NAME'			 => 'Внешний код',
							'IS_REQUIRED'	 => 'Y',
							'DEFAULT_VALUE'	 => '',
					),
					'CODE'						 =>
					array(
							'NAME'			 => 'Символьный код',
							'IS_REQUIRED'	 => 'N',
							'DEFAULT_VALUE'	 =>
							array(
									'UNIQUE'			 => 'N',
									'TRANSLITERATION'	 => 'N',
									'TRANS_LEN'			 => 100,
									'TRANS_CASE'		 => 'L',
									'TRANS_SPACE'		 => '-',
									'TRANS_OTHER'		 => '-',
									'TRANS_EAT'			 => 'Y',
									'USE_GOOGLE'		 => 'N',
							),
					),
					'TAGS'						 =>
					array(
							'NAME'			 => 'Теги',
							'IS_REQUIRED'	 => 'N',
							'DEFAULT_VALUE'	 => '',
					),
					'SECTION_NAME'				 =>
					array(
							'NAME'			 => 'Название',
							'IS_REQUIRED'	 => 'Y',
							'DEFAULT_VALUE'	 => '',
					),
					'SECTION_PICTURE'			 =>
					array(
							'NAME'			 => 'Картинка для анонса',
							'IS_REQUIRED'	 => 'N',
							'DEFAULT_VALUE'	 =>
							array(
									'FROM_DETAIL'				 => 'N',
									'SCALE'						 => 'N',
									'WIDTH'						 => '',
									'HEIGHT'					 => '',
									'IGNORE_ERRORS'				 => 'N',
									'METHOD'					 => 'resample',
									'COMPRESSION'				 => 95,
									'DELETE_WITH_DETAIL'		 => 'N',
									'UPDATE_WITH_DETAIL'		 => 'N',
									'USE_WATERMARK_TEXT'		 => 'N',
									'WATERMARK_TEXT'			 => '',
									'WATERMARK_TEXT_FONT'		 => '',
									'WATERMARK_TEXT_COLOR'		 => '',
									'WATERMARK_TEXT_SIZE'		 => '',
									'WATERMARK_TEXT_POSITION'	 => 'tl',
									'USE_WATERMARK_FILE'		 => 'N',
									'WATERMARK_FILE'			 => '',
									'WATERMARK_FILE_ALPHA'		 => '',
									'WATERMARK_FILE_POSITION'	 => 'tl',
									'WATERMARK_FILE_ORDER'		 => NULL,
							),
					),
					'SECTION_DESCRIPTION_TYPE'	 =>
					array(
							'NAME'			 => 'Тип описания',
							'IS_REQUIRED'	 => 'Y',
							'DEFAULT_VALUE'	 => 'text',
					),
					'SECTION_DESCRIPTION'		 =>
					array(
							'NAME'			 => 'Описание',
							'IS_REQUIRED'	 => 'N',
							'DEFAULT_VALUE'	 => '',
					),
					'SECTION_DETAIL_PICTURE'	 =>
					array(
							'NAME'			 => 'Детальная картинка',
							'IS_REQUIRED'	 => 'N',
							'DEFAULT_VALUE'	 =>
							array(
									'SCALE'						 => 'N',
									'WIDTH'						 => '',
									'HEIGHT'					 => '',
									'IGNORE_ERRORS'				 => 'N',
									'METHOD'					 => 'resample',
									'COMPRESSION'				 => 95,
									'USE_WATERMARK_TEXT'		 => 'N',
									'WATERMARK_TEXT'			 => '',
									'WATERMARK_TEXT_FONT'		 => '',
									'WATERMARK_TEXT_COLOR'		 => '',
									'WATERMARK_TEXT_SIZE'		 => '',
									'WATERMARK_TEXT_POSITION'	 => 'tl',
									'USE_WATERMARK_FILE'		 => 'N',
									'WATERMARK_FILE'			 => '',
									'WATERMARK_FILE_ALPHA'		 => '',
									'WATERMARK_FILE_POSITION'	 => 'tl',
									'WATERMARK_FILE_ORDER'		 => NULL,
							),
					),
					'SECTION_XML_ID'			 =>
					array(
							'NAME'			 => 'Внешний код',
							'IS_REQUIRED'	 => 'N',
							'DEFAULT_VALUE'	 => '',
					),
					'SECTION_CODE'				 =>
					array(
							'NAME'			 => 'Символьный код',
							'IS_REQUIRED'	 => 'N',
							'DEFAULT_VALUE'	 =>
							array(
									'UNIQUE'			 => 'N',
									'TRANSLITERATION'	 => 'N',
									'TRANS_LEN'			 => 100,
									'TRANS_CASE'		 => 'L',
									'TRANS_SPACE'		 => '-',
									'TRANS_OTHER'		 => '-',
									'TRANS_EAT'			 => 'Y',
									'USE_GOOGLE'		 => 'N',
							),
					),
		));
		$helper->Iblock()->saveGroupPermissions($iblockId, array(
				'administrators' => 'X',
				'everyone'		 => 'R',
		));

		//
		$arBlockStringSubPropsIds = [
			];
		$arBlockStringSubPropsIds[] = $helper->Iblock()->saveProperty($iblockId,
			array(
					'NAME'				 => 'Индекс',
					'ACTIVE'			 => 'Y',
					'SORT'				 => '110',
					'CODE'				 => 'BLOCK_STRING_INDEX',
					'DEFAULT_VALUE'		 => '',
					'PROPERTY_TYPE'		 => 'N',
					'ROW_COUNT'			 => '1',
					'COL_COUNT'			 => '7',
					'LIST_TYPE'			 => 'L',
					'MULTIPLE'			 => 'Y',
					'XML_ID'			 => NULL,
					'FILE_TYPE'			 => '',
					'MULTIPLE_CNT'		 => '5',
					'LINK_IBLOCK_ID'	 => '0',
					'WITH_DESCRIPTION'	 => 'N',
					'SEARCHABLE'		 => 'N',
					'FILTRABLE'			 => 'N',
					'IS_REQUIRED'		 => 'N',
					'VERSION'			 => '1',
					'USER_TYPE'			 => NULL,
					'USER_TYPE_SETTINGS' => NULL,
					'HINT'				 => '',
		));
		$arBlockStringSubPropsIds[] = $helper->Iblock()->saveProperty($iblockId,
			array(
					'NAME'				 => 'Контент',
					'ACTIVE'			 => 'Y',
					'SORT'				 => '120',
					'CODE'				 => 'BLOCK_STRING_CONTENT',
					'DEFAULT_VALUE'		 => '',
					'PROPERTY_TYPE'		 => 'S',
					'ROW_COUNT'			 => '3',
					'COL_COUNT'			 => '90',
					'LIST_TYPE'			 => 'L',
					'MULTIPLE'			 => 'Y',
					'XML_ID'			 => NULL,
					'FILE_TYPE'			 => '',
					'MULTIPLE_CNT'		 => '5',
					'LINK_IBLOCK_ID'	 => '0',
					'WITH_DESCRIPTION'	 => 'N',
					'SEARCHABLE'		 => 'N',
					'FILTRABLE'			 => 'N',
					'IS_REQUIRED'		 => 'N',
					'VERSION'			 => '1',
					'USER_TYPE'			 => NULL,
					'USER_TYPE_SETTINGS' => NULL,
					'HINT'				 => '',
		));
		$helper->Iblock()->saveProperty($iblockId,
			array(
					'NAME'				 => 'Блок "Строка"',
					'ACTIVE'			 => 'Y',
					'SORT'				 => '100',
					'CODE'				 => 'BLOCK_STRING',
					'DEFAULT_VALUE'		 => NULL,
					'PROPERTY_TYPE'		 => 'S',
					'ROW_COUNT'			 => '1',
					'COL_COUNT'			 => '30',
					'LIST_TYPE'			 => 'L',
					'MULTIPLE'			 => 'Y',
					'XML_ID'			 => NULL,
					'FILE_TYPE'			 => '',
					'MULTIPLE_CNT'		 => '5',
					'LINK_IBLOCK_ID'	 => '0',
					'WITH_DESCRIPTION'	 => 'N',
					'SEARCHABLE'		 => 'N',
					'FILTRABLE'			 => 'N',
					'IS_REQUIRED'		 => 'N',
					'VERSION'			 => '1',
					'USER_TYPE'			 => 'simai_complex',
					'USER_TYPE_SETTINGS' =>
					array(
							'SUBPROPS'		 => $arBlockStringSubPropsIds,
							'SUBPROPS_REQ'	 =>
							array(
									0	 => 1,
									1	 => 0,
							),
					),
					'HINT'				 => 'Для вывода значения в шаблоне используйте {=string_xxx}, где xxx - индекс блока',
		));

		//
		$arBlockHtmlSubPropsIds = [
			];
		$arBlockHtmlSubPropsIds[] = $helper->Iblock()->saveProperty($iblockId,
			array(
					'NAME'				 => 'Индекс',
					'ACTIVE'			 => 'Y',
					'SORT'				 => '210',
					'CODE'				 => 'BLOCK_HTML_INDEX',
					'DEFAULT_VALUE'		 => '',
					'PROPERTY_TYPE'		 => 'N',
					'ROW_COUNT'			 => '1',
					'COL_COUNT'			 => '7',
					'LIST_TYPE'			 => 'L',
					'MULTIPLE'			 => 'Y',
					'XML_ID'			 => NULL,
					'FILE_TYPE'			 => '',
					'MULTIPLE_CNT'		 => '5',
					'LINK_IBLOCK_ID'	 => '0',
					'WITH_DESCRIPTION'	 => 'N',
					'SEARCHABLE'		 => 'N',
					'FILTRABLE'			 => 'N',
					'IS_REQUIRED'		 => 'N',
					'VERSION'			 => '1',
					'USER_TYPE'			 => NULL,
					'USER_TYPE_SETTINGS' => NULL,
					'HINT'				 => '',
		));
		$arBlockHtmlSubPropsIds[] = $helper->Iblock()->saveProperty($iblockId,
			array(
					'NAME'				 => 'Контент',
					'ACTIVE'			 => 'Y',
					'SORT'				 => '220',
					'CODE'				 => 'BLOCK_HTML_CONTENT',
					'DEFAULT_VALUE'		 =>
					array(
							'TYPE'	 => 'HTML',
							'TEXT'	 => '',
					),
					'PROPERTY_TYPE'		 => 'S',
					'ROW_COUNT'			 => '1',
					'COL_COUNT'			 => '30',
					'LIST_TYPE'			 => 'L',
					'MULTIPLE'			 => 'Y',
					'XML_ID'			 => NULL,
					'FILE_TYPE'			 => '',
					'MULTIPLE_CNT'		 => '5',
					'LINK_IBLOCK_ID'	 => '0',
					'WITH_DESCRIPTION'	 => 'N',
					'SEARCHABLE'		 => 'N',
					'FILTRABLE'			 => 'N',
					'IS_REQUIRED'		 => 'N',
					'VERSION'			 => '1',
					'USER_TYPE'			 => 'HTML',
					'USER_TYPE_SETTINGS' =>
					array(
							'height' => 200,
					),
					'HINT'				 => '',
		));
		$helper->Iblock()->saveProperty($iblockId,
			array(
					'NAME'				 => 'Блок "Html"',
					'ACTIVE'			 => 'Y',
					'SORT'				 => '200',
					'CODE'				 => 'BLOCK_HTML',
					'DEFAULT_VALUE'		 => NULL,
					'PROPERTY_TYPE'		 => 'S',
					'ROW_COUNT'			 => '1',
					'COL_COUNT'			 => '30',
					'LIST_TYPE'			 => 'L',
					'MULTIPLE'			 => 'Y',
					'XML_ID'			 => NULL,
					'FILE_TYPE'			 => '',
					'MULTIPLE_CNT'		 => '5',
					'LINK_IBLOCK_ID'	 => '0',
					'WITH_DESCRIPTION'	 => 'N',
					'SEARCHABLE'		 => 'N',
					'FILTRABLE'			 => 'N',
					'IS_REQUIRED'		 => 'N',
					'VERSION'			 => '1',
					'USER_TYPE'			 => 'simai_complex',
					'USER_TYPE_SETTINGS' =>
					array(
							'SUBPROPS'		 => $arBlockHtmlSubPropsIds,
							'SUBPROPS_REQ'	 =>
							array(
									0	 => 1,
									1	 => 0,
							),
					),
					'HINT'				 => 'Для вывода значения в шаблоне используйте {=html_xxx}, где xxx - индекс блока',
		));

		//
		$arBlockFileSubPropsIds = [
			];
		$arBlockFileSubPropsIds[] = $helper->Iblock()->saveProperty($iblockId,
			array(
					'NAME'				 => 'Индекс',
					'ACTIVE'			 => 'Y',
					'SORT'				 => '310',
					'CODE'				 => 'BLOCK_FILE_INDEX',
					'DEFAULT_VALUE'		 => '',
					'PROPERTY_TYPE'		 => 'N',
					'ROW_COUNT'			 => '1',
					'COL_COUNT'			 => '7',
					'LIST_TYPE'			 => 'L',
					'MULTIPLE'			 => 'Y',
					'XML_ID'			 => NULL,
					'FILE_TYPE'			 => '',
					'MULTIPLE_CNT'		 => '5',
					'LINK_IBLOCK_ID'	 => '0',
					'WITH_DESCRIPTION'	 => 'N',
					'SEARCHABLE'		 => 'N',
					'FILTRABLE'			 => 'N',
					'IS_REQUIRED'		 => 'N',
					'VERSION'			 => '1',
					'USER_TYPE'			 => NULL,
					'USER_TYPE_SETTINGS' => NULL,
					'HINT'				 => '',
		));
		$arBlockFileSubPropsIds[] = $helper->Iblock()->saveProperty($iblockId,
			array(
					'NAME'				 => 'Файл',
					'ACTIVE'			 => 'Y',
					'SORT'				 => '320',
					'CODE'				 => 'BLOCK_FILE_CONTENT',
					'DEFAULT_VALUE'		 => '',
					'PROPERTY_TYPE'		 => 'F',
					'ROW_COUNT'			 => '1',
					'COL_COUNT'			 => '30',
					'LIST_TYPE'			 => 'L',
					'MULTIPLE'			 => 'Y',
					'XML_ID'			 => NULL,
					'FILE_TYPE'			 => 'jpg, gif, bmp, png, jpeg',
					'MULTIPLE_CNT'		 => '5',
					'LINK_IBLOCK_ID'	 => '0',
					'WITH_DESCRIPTION'	 => 'N',
					'SEARCHABLE'		 => 'N',
					'FILTRABLE'			 => 'N',
					'IS_REQUIRED'		 => 'N',
					'VERSION'			 => '1',
					'USER_TYPE'			 => NULL,
					'USER_TYPE_SETTINGS' => NULL,
					'HINT'				 => '',
		));
		$helper->Iblock()->saveProperty($iblockId,
			array(
					'NAME'				 => 'Блок "Файл"',
					'ACTIVE'			 => 'Y',
					'SORT'				 => '300',
					'CODE'				 => 'BLOCK_FILE',
					'DEFAULT_VALUE'		 => NULL,
					'PROPERTY_TYPE'		 => 'S',
					'ROW_COUNT'			 => '1',
					'COL_COUNT'			 => '30',
					'LIST_TYPE'			 => 'L',
					'MULTIPLE'			 => 'Y',
					'XML_ID'			 => NULL,
					'FILE_TYPE'			 => '',
					'MULTIPLE_CNT'		 => '5',
					'LINK_IBLOCK_ID'	 => '0',
					'WITH_DESCRIPTION'	 => 'N',
					'SEARCHABLE'		 => 'N',
					'FILTRABLE'			 => 'N',
					'IS_REQUIRED'		 => 'N',
					'VERSION'			 => '1',
					'USER_TYPE'			 => 'simai_complex',
					'USER_TYPE_SETTINGS' =>
					array(
							'SUBPROPS'		 => $arBlockFileSubPropsIds,
							'SUBPROPS_REQ'	 =>
							array(
									0	 => 1,
									1	 => 0,
							),
					),
					'HINT'				 => 'Для вывода значения в шаблоне используйте {=file_src_xxx}, где xxx - индекс блока',
		));

		//
		$helper->UserOptions()->saveElementForm($iblockId,
			array(
					'Элемент|edit1'			 =>
					array(
							'ACTIVE' => 'Активность',
							'NAME'	 => 'Название (любое)',
							'SORT'	 => 'Сортировка',
					),
					'Шаблон|edit2'			 =>
					array(
							'DETAIL_TEXT' => 'Шаблон страницы',
					),
					'Контентные блоки|edit3' =>
					array(
							'PROPERTY_BLOCK_STRING'	 => 'Блок "Строка"',
							'PROPERTY_BLOCK_HTML'	 => 'Блок "Html"',
							'PROPERTY_BLOCK_FILE'	 => 'Блок "Файл"',
					),
					'Разделы|edit4'			 =>
					array(
							'SECTIONS' => 'Разделы',
					),
		));
		$helper->UserOptions()->saveElementGrid($iblockId,
			array(
					'views'			 =>
					array(
							'default' =>
							array(
									'columns'			 =>
									array(
											0 => '',
									),
									'columns_sizes'		 =>
									array(
											'expand'	 => 1,
											'columns'	 =>
											array(
											),
									),
									'sticked_columns'	 =>
									array(
									),
									'last_sort_by'		 => 'id',
									'last_sort_order'	 => 'asc',
							),
					),
					'filters'		 =>
					array(
					),
					'current_view'	 => 'default',
		));
	}

	public function down()
	{
		//your code ...
	}

}
