<?php

$params = require(dirname(__FILE__).'/params.php');

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',

	// preloading 'log' component
	'preload'=>array('log'),

	// application components
	'components'=>array(

        'apache_access_logs'=>array(
            'class'=>'application.modules.apache.components.ApacheLog',
            'path' => $params['pathToApacheAccessLog'],
        ),

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),

	),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params'=> $params,
    'commandMap' => array(
        'apacheLogger' => array(
            'class' => 'application.modules.apache.commands.ApacheLoggerCommand',
        ),
    ),

);
