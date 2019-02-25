<?php

/*
 * 
 */

namespace model\filter;

use base\Filter;

/**
 * Description of FilterResumed
 *
 * @author i.molochnikov
 */
class FilterResumed extends Filter {

    public function isValid($item) {
        return $item['resumed'];
    }

}
