<?php

/*
 * 
 */

namespace model\filter;

use base\Filter;
use exception\ArgumentException;

/**
 * Description of FilterDate
 *
 * @author i.molochnikov
 */
class FilterDate extends Filter {

    private $dateProperty;
    private $dateStart;
    private $dateEnd;
    private $dateFormat = 'Y.m.d H:i:s.u';

    public function isValid($item) {
        
        $filteredDateString = $item[$this->dateProperty];
  
        $filteredDateArr = date_parse_from_format($this->dateFormat, $filteredDateString);
        $filteredTime = strtotime($filteredDateArr['day'] . '.' . $filteredDateArr['month'] . '.' . $filteredDateArr['year']);

        if ($filteredTime < $this->dateStart or $filteredTime > $this->dateEnd) {
            return false;
        }
        return true;
    }

    public function __construct($dateProperty, $dateStart, $dateEnd = null) {

        $this->dateProperty = $dateProperty;
        $this->dateStart = strtotime($dateStart . ' 00:00:00');
        if (!$this->dateStart) {
            throw new ArgumentException('отсуствует обязательный аргумент или неверный формат даты: ' . $dateStart);
        }

        if (!empty(strtotime($dateEnd))) {
            $this->dateEnd = strtotime($dateEnd . ' 23:59:59');
        } else {
            $this->dateEnd = strtotime($dateStart . ' 23:59:59');
        }
        if ($this->dateStart > $this->dateEnd) {
            throw new ArgumentException('начальная дата больше конечной');
        }
    }

}
