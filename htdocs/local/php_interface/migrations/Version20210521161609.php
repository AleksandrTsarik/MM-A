<?php

namespace Sprint\Migration;

class Version20210521161609 extends Version {

	protected $description = "Добавлен ИБ \"Весовые категории\"";
	protected $moduleVersion = "3.22.2";

	/**
	 * @throws Exceptions\HelperException
	 * @return bool|void
	 */
	public function up()
	{
		$helper = $this->getHelperManager();
		$iblockId = $helper->Iblock()->saveIblock(array(
				'IBLOCK_TYPE_ID'	 => 'dictionaries',
				'LID'				 =>
				array(
						0 => 's1',
				),
				'CODE'				 => 'weight_category',
				'API_CODE'			 => 'WeightCategory',
				'NAME'				 => 'Весовые категории',
				'ACTIVE'			 => 'Y',
				'SORT'				 => '500',
				'LIST_PAGE_URL'		 => '',
				'DETAIL_PAGE_URL'	 => '',
				'SECTION_PAGE_URL'	 => '',
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
				'INDEX_SECTION'		 => 'N',
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
				'ELEMENTS_NAME'		 => 'Категории',
				'ELEMENT_NAME'		 => 'Категория',
				'EXTERNAL_ID'		 => NULL,
				'LANG_DIR'			 => '/',
				'ELEMENT_ADD'		 => 'Добавить категорию',
				'ELEMENT_EDIT'		 => 'Изменить категорию',
				'ELEMENT_DELETE'	 => 'Удалить категорию',
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
				'DETAIL_TEXT_TYPE'			 =>
				array(
						'NAME'			 => 'Тип детального описания',
						'IS_REQUIRED'	 => 'Y',
						'DEFAULT_VALUE'	 => 'text',
				),
				'DETAIL_TEXT'				 =>
				array(
						'NAME'			 => 'Детальное описание',
						'IS_REQUIRED'	 => 'N',
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
		$helper->Iblock()->saveProperty($iblockId,
			array(
				'NAME'				 => 'Название (ru)',
				'ACTIVE'			 => 'Y',
				'SORT'				 => '100',
				'CODE'				 => 'NAME_RU',
				'DEFAULT_VALUE'		 => '',
				'PROPERTY_TYPE'		 => 'S',
				'ROW_COUNT'			 => '1',
				'COL_COUNT'			 => '30',
				'LIST_TYPE'			 => 'L',
				'MULTIPLE'			 => 'N',
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
				'NAME'				 => 'Минимальный вес',
				'ACTIVE'			 => 'Y',
				'SORT'				 => '110',
				'CODE'				 => 'MIN_WEIGHT',
				'DEFAULT_VALUE'		 => '',
				'PROPERTY_TYPE'		 => 'N',
				'ROW_COUNT'			 => '1',
				'COL_COUNT'			 => '30',
				'LIST_TYPE'			 => 'L',
				'MULTIPLE'			 => 'N',
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
				'NAME'				 => 'Максимальный вес',
				'ACTIVE'			 => 'Y',
				'SORT'				 => '120',
				'CODE'				 => 'MAX_WEIGHT',
				'DEFAULT_VALUE'		 => '',
				'PROPERTY_TYPE'		 => 'N',
				'ROW_COUNT'			 => '1',
				'COL_COUNT'			 => '30',
				'LIST_TYPE'			 => 'L',
				'MULTIPLE'			 => 'N',
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
				'NAME'				 => 'Название (en)',
				'ACTIVE'			 => 'Y',
				'SORT'				 => '200',
				'CODE'				 => 'NAME_EN',
				'DEFAULT_VALUE'		 => '',
				'PROPERTY_TYPE'		 => 'S',
				'ROW_COUNT'			 => '1',
				'COL_COUNT'			 => '30',
				'LIST_TYPE'			 => 'L',
				'MULTIPLE'			 => 'N',
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
		$helper->UserOptions()->saveElementForm($iblockId,
			array(
				'Элемент|edit1'	 =>
				array(
						'ACTIVE'				 => 'Активность',
						'NAME'					 => 'Название',
						'SORT'					 => 'Сортировка',
						'PROPERTY_MIN_WEIGHT'	 => 'Минимальный вес',
						'PROPERTY_MAX_WEIGHT'	 => 'Максимальный вес',
				),
				'Ru|cedit1'		 =>
				array(
						'PROPERTY_NAME_RU' => 'Название',
				),
				'En|cedit2'		 =>
				array(
						'PROPERTY_NAME_EN' => 'Название',
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
										0	 => 'NAME',
										1	 => 'EXTERNAL_ID',
										2	 => 'TIMESTAMP_X',
										3	 => 'ID',
										4	 => 'PROPERTY_NAME_RU',
										5	 => 'PROPERTY_NAME_EN',
										6	 => 'PROPERTY_MIN_WEIGHT',
										7	 => 'PROPERTY_MAX_WEIGHT',
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
								'custom_names'		 => NULL,
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