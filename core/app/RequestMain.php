<?php

/*
 * 
 */

namespace app;

use base\Request;

/**
 * Description of RequestMain
 *
 * @author i.molochnikov
 */
class RequestMain extends Request {

    private $properties = [];

    
    public function setProperty($key, $value) {
        
        $this->properties[$key] = $value;
    }

    public function init() {
        
        if (isset($_SERVER['REQUEST_METHOD'])) {
            $this->properties = $_REQUEST;           
        }
      
    }

    public function getProperty($key) {
        if (isset($this->properties[$key])){
            return $this->properties[$key];
        }
        return null;
    }

    public function __construct() {
        $this->init();
    }

}
