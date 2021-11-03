<?

namespace Ms\Main;

use \Bitrix\Main\Application;
use \Bitrix\Main\PhoneNumber\Format;
use \Bitrix\Main\PhoneNumber\Formatter;
use \Bitrix\Main\PhoneNumber\Parser;

class Helper extends HelperBase {

	/**
	 * Возвращает очищенную строку телефона
	 * @param string $phone
	 * @return string
	 */
	public static function formatPhone($phone)
	{
		return substr(preg_replace('/\D/', '', $phone), -10);
	}

	/**
	 * Возвращает телефон в формате "+7"
	 * @param string $phone
	 * @return string
	 */
	public static function formatPhone7($phone)
	{
		$phone = static::formatPhone($phone);

		return (strlen($phone) == 10 ? "+7{$phone}" : $phone);
	}

	/**
	 * Возвращает телефон в формате "8"
	 * @param string $phone
	 * @return string
	 */
	public static function formatPhone8($phone)
	{
		$phone = static::formatPhone($phone);

		return (strlen($phone) == 10 ? "8{$phone}" : $phone);
	}

	/**
	 * Возвращает телефон в международном формате E.164 для RU
	 * @param string $phone
	 * @return string
	 */
	public static function formatPhoneE164($phone)
	{
		$parser = Parser::getInstance()->parse(static::formatPhone($phone), 'RU');
		return Formatter::format($parser, Format::E164);
	}

	/**
	 * Подключение composer
	 */
	public static function includeComposer()
	{
		include_once Application::getDocumentRoot() . '/local/backend/composer/vendor/autoload.php';
	}

	/**
	 * Возвращает xml_id варианта пользовательского типа по его id
	 * @param integer|array $enumId id варианта пользовательского типа
	 * @return string|array|null
	 */
	public static function getUfEnumXmlIdById($enumId)
	{
		$arEnumXmlIds = [];

		if (!empty($enumId)) {
			$db = \CUserFieldEnum::GetList([], [
						'ID' => $enumId
			]);

			while ($ar = $db->Fetch()) {
				$arEnumXmlIds[$ar['ID']] = $ar['XML_ID'];
			}
		}

		return is_array($enumId) ? $arEnumXmlIds : reset($arEnumXmlIds);
	}

}
