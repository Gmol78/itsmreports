<?php

/*
 *
 */

namespace model\filter;
use base\Filter;

/**
 * Description of FilterOpenRequest
 *
 * @author i.molochnikov
 */
class FilterOpenRequest extends Filter {
    
    public function isValid($item) {
        return  ($item['state'] != 'closed' and $item['state'] != 'resolved');
    }    
}
