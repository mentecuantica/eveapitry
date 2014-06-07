<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return [
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Eve online api2, yii, phealng - mix',
    // preloading 'log' component
    'preload' => ['log'],
    // autoloading model and component classes
    'import' => [
        'application.models.*',
        'application.models.eve.*',
        'application.components.*',
    ],
    'modules' => [
        'gii' => [
            'class' => 'system.gii.GiiModule',
            'password' => 'waka',
            'ipFilters' => ['127.0.0.1', '::1'],
        ],

    ],
    // application components
    'components' => [
        'user' => [
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ],
        // uncomment the following to enable URLs in path-format

        'urlManager' => [
            'urlFormat' => 'path',
            'showScriptName'=>false,
            'rules' => [
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],


        'db' => [
            'connectionString' => 'mysql:host=localhost;dbname=eve',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'log' => [
            'class' => 'CLogRouter',
            'routes' => [
                [
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ],
                // uncomment the following to show log messages on web pages
                /*
                array(
                    'class'=>'CWebLogRoute',
                ),
                */
            ],
        ],
    ],
    'params' => [
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',


        'keyId'=>"3428148",
        'vCode'=>"AuQFNxcETQnBiHBwRtqcbRu0VXtM0yVNcbJQYzoiIg8PEujlCZJ2h1av0yeJqCdL",
        'accessMask'=>"58785816",

        //AuQFNxcETQnBiHBwRtqcbRu0VXtM0yVNcbJQYzoiIg8PEujlCZJ2h1av0yeJqCdL
        //name = Mike Vazovskii
    ],
];