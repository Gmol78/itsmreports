<?php

/*
 *
 */

namespace model\filter;

use base\Filter;

/**
 * Description of FilterResponsible
 *
 * @author i.molochnikov
 */
class FilterServiceItem extends Filter {

    private $serviceKey;

    public function isValid($item) {
        return $item['service']['UUID'] == $this->serviceKey;
    }

    public function __construct($serviceKey) {
        $this->serviceKey = $serviceKey;
    }

}
