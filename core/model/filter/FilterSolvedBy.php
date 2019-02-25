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
class FilterSolvedBy extends Filter {

    private $solvedByKey;

    public function isValid($item) {
        return $item['solvedBy']['UUID'] == $this->solvedByKey;
    }

    public function __construct($solvedByKey) {
        $this->solvedByKey = $solvedByKey;
    }

}
