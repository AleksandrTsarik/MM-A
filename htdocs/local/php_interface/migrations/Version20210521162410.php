<?php

namespace Sprint\Migration;

class Version20210521162410 extends Version {

	protected $description = "Добавлен ИБ \"Новости\" (ru)";
	protected $moduleVersion = "3.22.2";

	/**
	 * @throws Exceptions\HelperException
	 * @return bool|void
	 */
	public function up()
	{
		$helper = $this->getHelperManager();
		$iblockId = $helper->Iblock()->saveIblock(array(
				'IBLOCK_TYPE_ID'	 => 'content_ru',
				'LID'				 =>
				array(
						0 => 's1',
				),
				'CODE'				 => 'news_ru',
				'API_CODE'			 => 'NewsRu',
				'NAME'				 => 'Новости',
				'ACTIVE'			 => 'Y',
				'SORT'				 => '500',
				'LIST_PAGE_URL'		 => '#SITE_DIR#/news/',
				'DETAIL_PAGE_URL'	 => '#SITE_DIR#/news/#ELEMENT_CODE#/',
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
				'INDEX_ELEMENT'		 => 'Y',
				'INDEX_SECTION'		 => 'N',
				'WORKFLOW'			 => 'N',
				'BIZPROC'			 => 'N',
				'SECTION_CHOOSER'	 => 'L',
				'LIST_MODE'			 => 'C',
				'RIGHTS_MODE'		 => 'S',
				'SECTION_PROPERTY'	 => 'N',
				'PROPERTY_INDEX'	 => 'N',
				'VERSION'			 => '1',
				'LAST_CONV_ELEMENT'	 => '0',
				'SOCNET_GROUP_ID'	 => NULL,
				'EDIT_FILE_BEFORE'	 => '',
				'EDIT_FILE_AFTER'	 => '',
				'SECTIONS_NAME'		 => 'Разделы',
				'SECTION_NAME'		 => 'Раздел',
				'ELEMENTS_NAME'		 => 'Новости',
				'ELEMENT_NAME'		 => 'Новость',
				'EXTERNAL_ID'		 => NULL,
				'LANG_DIR'			 => '/',
				'ELEMENT_ADD'		 => 'Добавить новость',
				'ELEMENT_EDIT'		 => 'Изменить новость',
				'ELEMENT_DELETE'	 => 'Удалить новость',
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
						'IS_REQUIRED'	 => 'Y',
						'DEFAULT_VALUE'	 => '=today',
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
						'IS_REQUIRED'	 => 'Y',
						'DEFAULT_VALUE'	 =>
						array(
								'FROM_DETAIL'				 => 'Y',
								'SCALE'						 => 'Y',
								'WIDTH'						 => 1000,
								'HEIGHT'					 => 1000,
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
								'SCALE'						 => 'Y',
								'WIDTH'						 => 1000,
								'HEIGHT'					 => 1000,
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
						'DEFAULT_VALUE'	 => 'html',
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
						'IS_REQUIRED'	 => 'Y',
						'DEFAULT_VALUE'	 =>
						array(
								'UNIQUE'			 => 'Y',
								'TRANSLITERATION'	 => 'Y',
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
		$helper->UserOptions()->saveElementForm($iblockId,
			array(
				'Элемент|edit1'	 =>
				array(
						'ACTIVE'		 => 'Активность',
						'ACTIVE_FROM'	 => 'Начало активности',
						'ACTIVE_TO'		 => 'Окончание активности',
						'NAME'			 => 'Название',
						'CODE'			 => 'Символьный код',
						'SORT'			 => 'Сортировка',
				),
				'Анонс|edit5'	 =>
				array(
						'PREVIEW_PICTURE'	 => 'Картинка для анонса',
						'PREVIEW_TEXT'		 => 'Описание для анонса',
				),
				'Подробно|edit6' =>
				array(
						'DETAIL_PICTURE' => 'Детальная картинка',
						'DETAIL_TEXT'	 => 'Детальное описание',
				),
				'SEO|edit14'	 =>
				array(
						'IPROPERTY_TEMPLATES_ELEMENT_META_TITLE'				 => 'Шаблон META TITLE',
						'IPROPERTY_TEMPLATES_ELEMENT_META_KEYWORDS'				 => 'Шаблон META KEYWORDS',
						'IPROPERTY_TEMPLATES_ELEMENT_META_DESCRIPTION'			 => 'Шаблон META DESCRIPTION',
						'IPROPERTY_TEMPLATES_ELEMENT_PAGE_TITLE'				 => 'Заголовок элемента',
						'IPROPERTY_TEMPLATES_ELEMENTS_PREVIEW_PICTURE'			 => 'Настройки для картинок анонса элементов',
						'IPROPERTY_TEMPLATES_ELEMENT_PREVIEW_PICTURE_FILE_ALT'	 => 'Шаблон ALT',
						'IPROPERTY_TEMPLATES_ELEMENT_PREVIEW_PICTURE_FILE_TITLE' => 'Шаблон TITLE',
						'IPROPERTY_TEMPLATES_ELEMENT_PREVIEW_PICTURE_FILE_NAME'	 => 'Шаблон имени файла',
						'IPROPERTY_TEMPLATES_ELEMENTS_DETAIL_PICTURE'			 => 'Настройки для детальных картинок элементов',
						'IPROPERTY_TEMPLATES_ELEMENT_DETAIL_PICTURE_FILE_ALT'	 => 'Шаблон ALT',
						'IPROPERTY_TEMPLATES_ELEMENT_DETAIL_PICTURE_FILE_TITLE'	 => 'Шаблон TITLE',
						'IPROPERTY_TEMPLATES_ELEMENT_DETAIL_PICTURE_FILE_NAME'	 => 'Шаблон имени файла',
						'SEO_ADDITIONAL'										 => 'Дополнительно',
						'TAGS'													 => 'Теги',
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
										1	 => 'ACTIVE',
										2	 => 'SORT',
										3	 => 'CODE',
										4	 => 'TIMESTAMP_X',
										5	 => 'ID',
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
