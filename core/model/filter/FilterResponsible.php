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
class FilterResponsible extends Filter {

    private $responsibleKey;

    public function isValid($item) {
        return $item['responsible']['UUID'] == $this->responsibleKey;
    }

    public function __construct($responsibleKey) {
        $this->responsibleKey = $responsibleKey;
    }

}
