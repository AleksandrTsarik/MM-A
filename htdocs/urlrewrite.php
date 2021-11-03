<?php

$arUrlRewrite = [
		[
				'CONDITION'	 => '#^/api/#',
				'RULE'		 => '',
				'ID'		 => NULL,
				'PATH'		 => '/local/api/index.php',
				'SORT'		 => 20,
		],
		[
				'CONDITION'	 => '#^#',
				'RULE'		 => '',
				'ID'		 => 'bitrix:news',
				'PATH'		 => '/info-pages/index.php',
				'SORT'		 => 1000,
		],
];
