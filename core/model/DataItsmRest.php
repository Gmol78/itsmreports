<?php

/*
 * 
 */

namespace model;

use base\DataItsm;

/**
 *
 *
 * @author i.molochnikov
 */
class DataItsmRest extends DataItsm {

    private $dateFormat = 'Y.m.d H:i:s.u';
    private $data = null;
 
    
    public function __construct($teamId) {

        parent::__construct($teamId);
        $dataUrl = 'https://servicecloud.itsm365.com/sd/services/rest/find/serviceCall/?accessKey=' . $this->accessKey . '&responsibleTeam=' . $this->teamId;
        $dataJson = file_get_contents($dataUrl);
        $this->data = json_decode($dataJson, true);
    }

    public function getData() {
        return $this->data;
    }

    public function getDateFormat() {
        return $this->dateFormat;
    }

}
