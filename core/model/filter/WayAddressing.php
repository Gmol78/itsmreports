<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace model\filter;

use base\Filter;

/**
 * Description of WayAddressing
 *
 * @author i.molochnikov
 */
class WayAddressing extends Filter {

    private $wayCode;

    public function isValid($item) {
        return ($item['wayAddressing']['code'] == $this->wayCode );
    }

    public function __construct($wayCode) {
        $this->wayCode = $wayCode;
    }

}
