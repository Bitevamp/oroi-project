<?php
/*
 * Core configurations
 */

// Initiate standard classes
require_once ROOT.DS.APP_DIR.DS.'classes/html.class.php';
$html = new html($config);

// Get all needed modules
$handle = opendir($config['site_path'].'modules');
if ($handle) {
    /* This is the correct way to loop over the directory, apparantly */
    while (false !== ($dir = readdir($handle))) {
    	if ($dir != "." && $dir != "..") {
    	    if(is_dir($config['site_path'].'modules'.DS.$dir) && !preg_match("/^--.+/i", $dir)) {
    	        $subhandle = opendir($config['site_path'].'modules/'.$dir);
                if($subhandle) {
        	        while (false !== ($file = readdir($subhandle))) {
            	        if ($file != "." && $file != "..") {
            	            if($file == "functions.php") {
            	                require_once $config['site_path'].'modules/'.$dir.DS.$file;
        	                }
            	        }
        	        }
        	        closedir($subhandle);
    	        }
    	    }
		}
    }
    closedir($handle);
}