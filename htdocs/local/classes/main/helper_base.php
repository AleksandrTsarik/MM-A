<?

namespace Ms\Main;

class HelperBase {

	private static $cache = [
		];

	public static function getCache($key)
	{
		if (array_key_exists($key, self::$cache[static::class])) {
			return self::$cache[static::class][$key];
		} else {
			return null;
		}
	}

	public static function setCache($key, $value)
	{
		self::$cache[static::class][$key] = $value;
	}

	public static function clearCache($key)
	{
		unset(self::$cache[static::class][$key]);
	}

}
