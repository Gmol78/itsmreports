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
class FilterDoneRequest extends Filter {
    
    public function isValid($item) {
        return  ($item['state'] == 'closed' or $item['state'] == 'resolved');
    }    
}
