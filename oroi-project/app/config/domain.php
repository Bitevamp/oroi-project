<?php

/*
 * Site configurations
 */

$host = null;
if (!empty($_SERVER['HTTP_HOST'])) {
    $host = $_SERVER['HTTP_HOST'];
}

// Determine which host to use
switch ($host) {
    case 'localhost' :

        define('GOOGLE', false);
        define('ANALYTICS', false);
        define('SITEDIR', 'dbkproject');

        break;

    default :

        define('SITE_ENV', 'production');
        define('GOOGLE', true);
        define('ANALYTICS', true);

        break;
}

// @todo: default site configurations
$config['host'] = $host;
$config['sitedir'] = defined('SITEDIR') ? SITEDIR : '';

$config['domain'] = "http://".$config['host']; // Domain without slash
$config['sitepath'] = $config['domain'] . '/' . $config['sitedir']; // Site path

$config['site_path'] = ROOT.DS.APP_DIR.DS;
$config['theme_path'] = '';
$config['company'] = 'DBK | Masters in Online Buisness';