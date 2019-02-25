<?php

/*
 * 
 */

namespace base;

/**
 * Description of db
 *
 * @author i.molochnikov
 */
abstract class DataItsm {
    
    protected $teamId; 
    
    protected $accessKey = '14676306-d0f3-49b9-8300-77e0740c8bd3';
    
    public function __construct($teamId) {
        $this->teamId = $teamId;
    }
    
    abstract public function getData ();
    
}
