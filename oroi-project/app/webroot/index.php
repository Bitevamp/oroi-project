<?php
/*
 * Use the DS to seperate the directories in other defines
 */
(!defined('DS') ? define('DS', DIRECTORY_SEPARATOR) : NULL);

/*
 * The full directory which holds "app"
 */
(!defined('ROOT') ? define('ROOT', dirname(dirname(dirname(__FILE__)))) : null);

/*
 * The actual directory for "app"
 */
(!defined('APP_DIR') ? define('APP_DIR', basename(dirname(dirname(__FILE__)))) : null);

/*
 * Default "webroot" and "root" dir
 * Change at own risk
 */
(!defined('WEBROOT_DIR') ? define('WEBROOT_DIR', basename(dirname(__FILE__))) : null);
(!defined('WWW_ROOT') ? define('WWW_ROOT', dirname(__FILE__) . DS) : null);

/*
 * Default configuration:
 *  - Session / cache / locale
 *  - Database
 *  - Domain
 *  - Error reporting
 *  @todo: this needs some fixin still
 */
session_start();
header ('Cache-control: private');

(preg_match('/(windows|WINNT)/i', PHP_OS) ? setlocale(LC_ALL, 'nld_nld') : setlocale(LC_ALL, 'nl_nl.utf8'));

// @todo: create a loader file for views and classes
require_once ROOT.DS.APP_DIR.DS.'classes/db.class.php';
$db = new DB();

require_once ROOT.DS.'vendor/autoload.php';
require_once ROOT.DS.APP_DIR.DS.'config/database.php';
require_once ROOT.DS.APP_DIR.DS.'config/domain.php';
require_once ROOT.DS.APP_DIR.DS.'config/core.php';


// For now set error reporting to all
// @todo: Make check for production or development
error_reporting(E_ALL | E_STRICT | E_WARNING);

/*
 * Start output
 * @todo: fix for safety checks
 */
if(file_exists(ROOT.DS.APP_DIR.DS.'layout/home.tpl')) {
    require_once ROOT.DS.APP_DIR.DS.'layout/home.tpl';
} else {
    header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
    require_once ROOT.DS.APP_DIR.DS.'layout/404error.tpl';
}