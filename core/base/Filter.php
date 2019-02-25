<?php

/*
 *
 */

namespace base;

/**
 * 
 *
 * @author i.molochnikov
 */
abstract class Filter {
    
    /**
     * @param [mixed]
     * @return [bool]
     */
    abstract public function isValid($data);
}
