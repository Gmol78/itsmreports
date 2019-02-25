<?php

/*
 * 
 */

namespace app;

use app\RequestMain;
use model\DataItsmRest;
use model\DataHandlerBase;

/**
 * Description of Application
 *
 * @author i.molochnikov
 */
class Application {

    private static $instance = null;
    private $data = null;
    private $request = null;

    static function instance() {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getRequest() {

        if (is_null($this->request)) {
            $this->request = new RequestMain();
        }
        return $this->request;
    }

    private function __construct() {
        $this->setData();
    }
    
    public function getDataHandler() {
        return new DataHandlerBase($this->data);
    }

    private function setData() {
        
        if (is_null($this->data)) {
            $this->data = new DataItsmRest('team$2274902');
        }
    }

}
