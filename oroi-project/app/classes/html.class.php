<?php

/*
 * Standard html render class,
 * Returns standard html output which are often used
 */
class html
{
	private $config;

    public function __construct($config) {
    	$this->config = $config;
    }

    /**
     * render
     * Generates an html element with given properties
     *
     * @param $src
     * @param array $options
     * @return string, html element
     */
    public function render($src, $options = array()) {
        if(empty($src)) {
            return;
        }

        if(file_exists($this->config['site_path'].'layout/'.$src.'.tpl')) {
            $view_path = 'layout/'.$src.'.tpl';
        }
        else if(file_exists($this->config['site_path'].'modules/'.($modulesSrc = preg_replace("/^([^\/]*)\/(.*)/", "$1/views/$2", $src)).'.tpl')) {
            $view_path = 'modules/'.$modulesSrc.'.tpl';
        }

        if(empty($view_path)) {
			return 'Non-existing view on line #'.__line__.' ('.$src.')<br />';
		}

        if(!empty($options) && is_array($options)) {
            foreach($options as $key=>$option) {
                $$key = $option;
            }
        }

        ob_start();
        require $this->config['site_path'].$view_path;
        return ob_get_clean();
    }
}
