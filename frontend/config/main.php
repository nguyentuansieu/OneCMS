<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
	'homeUrl' => '/',
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
		'request' => [
            'baseUrl' => '',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
				'/' => 'site/index',
                'lien-he' => 'site/contact',
                'thumbs/<path:.*>' => 'site/thumb',
                [
                    'pattern' => 'san-pham',
                    'route' => 'product/index',
                    'suffix' => ''
                ],
                [
                    'pattern' => 'san-pham/<slug:[\w\-]+>',
                    'route' => 'product/view',
                    'suffix' => '.html'
                ],
                [
                    'pattern' => 'san-pham/<slug:[\w\-]+>',
                    'route' => 'category-product/view',
                    'suffix' => ''
                ],
                [
                    'pattern' => '<slug:[\w\-]+>',
                    'route' => 'category-post/view',
                    'suffix' => ''
                ],
                [
                    'pattern' => '<cslug:[\w\-]+>/<slug:[\w\-]+>',
                    'route' => 'post/view',
                    'suffix' => '.html'
                ],
                [
                    'pattern' => '<slug:[\w\-]+>',
                    'route' => 'page/view',
                    'suffix' => '.html',
                ],
            ],
        ],
        'imageCache' => [
            'class' => 'iutbay\yii2imagecache\ImageCache',
            'sourcePath' => '@app/web/uploads',
            'sourceUrl' => '@web/uploads',
            'thumbsPath' => '@app/web/thumbs',
            'thumbsUrl' => '@web/thumbs',
            'sizes' => [
                'post' => [600, 250],
                'postFontThumb' => [150,60],
            ],
        ],
    ],
    'params' => $params,
];
