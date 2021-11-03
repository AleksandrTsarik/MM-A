<?php

namespace Ms\Main\Content;

class Analytics {

	public static function includeYandexMetrika()
	{
		echo <<<HTML
<!-- Yandex.Metrika informer -->
<!-- /Yandex.Metrika counter -->
HTML;
	}

	public static function includeGoogleAnalytics()
	{
		echo <<<HTML
<!-- Global site tag (gtag.js) - Google Analytics -->
<!-- /Global site tag (gtag.js) - Google Analytics -->
HTML;
	}

}
