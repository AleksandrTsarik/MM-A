<?

namespace Ms\Main\Localization;

use \Bitrix\Main\Context;
use \Bitrix\Main\ORM\Data\DataManager;
use \Bitrix\Main\ORM\Objectify\EntityObject;
use \Ms\Main\HelperBase;

class Helper extends HelperBase {

	protected static $defaultLanguage = 'ru';
	protected static $arAllowLangguage = [
			'ru',
			'en',
	];

	/**
	 * Возвращает язык по-умолчанию
	 * @return string
	 */
	public static function getDefaultLanguage()
	{
		return static::$defaultLanguage;
	}

	/**
	 * Возвращает список разрешённых языков
	 * @return array
	 */
	public static function getAllowedLanguages()
	{
		return static::$arAllowLangguage;
	}

	/**
	 * Возвращает текущий язык сайта
	 * @return string
	 */
	public static function getLanguage()
	{
		$lang = Context::getCurrent()->getLanguage();

		if (!in_array($lang, static::getAllowedLanguages())) {
			return static::getDefaultLanguage();
		}

		return $lang;
	}

	/**
	 * Устанавливает текущий язык сайта
	 * @param string $lang
	 */
	public static function setLanguage($lang)
	{
		if (!in_array($lang, static::getAllowedLanguages())) {
			$lang = static::getDefaultLanguage();
		}

		Context::getCurrent()->setLanguage($lang);
	}

	/**
	 * Возвращает тип ИБ, соответствующий текущему языку сайта
	 * @param string $iblockType
	 * @return string
	 */
	public static function getIblockType($iblockType)
	{
		$cacheKey = __FUNCTION__ . '|' . static::getLanguage() . '|' . $iblockType;

		if (static::getCache($cacheKey) === null) {
			$tmpIblockType = static::clearLangSuffix($iblockType);
			static::setCache($cacheKey, $tmpIblockType . (substr($tmpIblockType, -1) !== '_' ? '_' : '') . static::getLanguage());
		}

		return static::getCache($cacheKey);
	}

	/**
	 * Возвращает символьный код ИБ, соответствующий текущему языку сайта
	 * @param string $iblockCode
	 * @return string
	 */
	public static function getIblockCode($iblockCode)
	{
		$cacheKey = __FUNCTION__ . '|' . static::getLanguage() . '|' . $iblockCode;

		if (static::getCache($cacheKey) === null) {
			$tmpIblockCode = static::clearLangSuffix($iblockCode);
			static::setCache($cacheKey, $tmpIblockCode . (substr($tmpIblockCode, -1) !== '_' ? '_' : '') . static::getLanguage());
		}

		return static::getCache($cacheKey);
	}

	/**
	 * Возвращает табличный класс или класс объекта сущности ИБ, соответствующий текущему языку сайта
	 * @param string $entityClass табличный класс или класс объекта сущности ИБ
	 * @return string
	 */
	/*
	public static function getEntityClass($entityClass)
	{
		$cacheKey = __FUNCTION__ . '|' . static::getLanguage() . '|' . $entityClass;

		if (static::getCache($cacheKey) === null) {
			$object = new $entityClass();

			if ($object instanceof EntityObject) {
				// класс объекта сущности
				$langEntityClass = static::clearLangSuffix($entityClass) . ucfirst(static::getLanguage());
			} elseif ($object instanceof DataManager) {
				// табличный класс
				$langEntityClass = static::clearLangSuffix(substr($entityClass, 0, -5)) . ucfirst(static::getLanguage()) . 'Table';
			}

			unset($object);

			static::setCache($cacheKey, !empty($langEntityClass) ? $langEntityClass : $entityClass);
		}

		return static::getCache($cacheKey);
	}
	*/

	/**
	 * Возвращает id ИБ, соответствующий текущему языку сайта
	 * @param string $entityClass табличный класс или класс объекта сущности ИБ
	 * @return int
	 */
	/*
	public static function getIblockIdByEntityClass($entityClass)
	{
		$cacheKey = __FUNCTION__ . '|' . static::getLanguage() . '|' . $entityClass;

		if (static::getCache($cacheKey) === null) {

			$langEntityClass = static::getEntityClass($entityClass);

			$object = new $langEntityClass();

			if ($object instanceof EntityObject) {
				// класс объекта сущности
				$iblockId = $object->getIblockId();
			} elseif ($object instanceof DataManager) {
				// табличный класс
				$iblockId = $langEntityClass::createObject()->getIblockId();
			}

			static::setCache($cacheKey, $iblockId ?: 0);
		}

		return static::getCache($cacheKey);
	}
	*/

	public static function clearLangSuffix($str)
	{
		$lowStr = strtolower($str);

		foreach (static::getAllowedLanguages() as $lang) {
			$len = strlen($lang);

			if (substr($lowStr, - $len) === $lang) {
				$notLangStr = substr($str, 0, - $len);
				break;
			}
		}

		return !empty($notLangStr) ? $notLangStr : $str;
	}

}
