<?php
return array(
	//'配置项'=>'配置值'
	// 'DEFAULT_V_LAYER'		=> 'Template',
	// 'TMPL_TEMPLATE_SUFFIX'	=> '.stone',
	// 'TMPL_FILE_DEPR'			=> '_'
	// 'VIEW_PATH'
	'DEFAULT_THEME'				=> 'default',
	'TMPL_DETECT_THEME' 		=> true,
	'THEME_LIST' 				=>'default,stone',
	'TMPL_PARSE_STRING'			=>array(
			'__CDN__'=>'./Cdn',
			'__AVATAR__'=>__ROOT__.'/Uploads/avatar'
		)
);