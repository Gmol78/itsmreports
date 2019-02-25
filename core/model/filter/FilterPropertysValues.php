<?php

/*
 * 
 */

namespace model\filter;

use base\Filter;

/**
 * Description of FilterPropertysValues
 *
 * @author i.molochnikov
 */
class FilterPropertysValuesAnd extends Filter {
    
    private $properties = [];


    public function isValid($item) {
        foreach ($this->properties as $key => $value) {
            if ($item[$key] != $value) {
                return false;
            }            
        }
        return true;
    }
    
    
    public function __construct(array $properties) {
        $this->properties = $properties;
    }
}
