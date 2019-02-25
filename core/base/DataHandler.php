<?php

/*
 * 
 */

namespace base;
use base\Filter;

/**
 * Description of DataHandler
 *
 * @author i.molochnikov
 */
abstract class DataHandler implements \Countable {
    
    protected $dataStorage;
    
    /**
     * 
     */
    abstract public function find(Filter $filter);
    
    public function count() {
        return count($this->dataStorage);
    }
}
