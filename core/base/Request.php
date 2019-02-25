<?php

/*
 * 
 */

namespace base;

/**
 * Description of Request
 *
 * @author i.molochnikov
 */
abstract class Request {
    
    abstract public function init();
    
    abstract public function getProperty($key);
    
    abstract public function setProperty($key, $value);
    
}
