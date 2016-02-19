<?php

/*
 * Database configurations
 */

$host = null;
if (!empty($_SERVER['HTTP_HOST'])) {
    $host = $_SERVER['HTTP_HOST'];
}

// Determine which host to use
switch ($host) {
    case 'localhost' :

        $dbase['host'] = 'localhost';
        $dbase['name'] = 'dbk_oroi';
        $dbase['user'] = 'dbk_user';
        $dbase['pass'] = 'qbvZYSPRPe9MPFpA';

        break;

    default :

        $dbase['host'] = 'localhost';
        $dbase['name'] = 'omgeke_db';
        $dbase['user'] = 'omgeke_user';
        $dbase['pass'] = 'qbvZYSPRPe9MPFpA';

        break;
}

/**
 * Connect using traditional MySQL functionality in PHP
 */
$GLOBALS['__db_link'] = $db->connect($dbase['host'], $dbase['user'], $dbase['pass']);
(!$GLOBALS['__db_link'] ? die('No database connection!') : ((bool)mysqli_query($GLOBALS['__db_link'], "USE ".$dbase['name'])) );