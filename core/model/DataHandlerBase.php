<?php

/*
 * 
 */

namespace model;

use base\DataHandler;
use base\Filter;
use base\DataItsm;

/**
 * Description of DataHandlerBase
 *
 * @author i.molochnikov
 */
class DataHandlerBase extends DataHandler {

    private $data;
    protected $dataStorage;
    
    private $wayAddresingList = null;
    private $responsiblesList = null;
    private $solvedByList = null;
    private $servicesList = null;

    public function find(Filter $filter) {

        foreach ($this->dataStorage as $itemIndex => $item) {

            if (!$filter->isValid($item)) {
                unset($this->dataStorage[$itemIndex]);
            }
        }
    }

    public function __construct(DataItsm $data) {

        $this->data = $data;
        $this->dataStorage = $data->getData();
    }

    public function getResult() {
        return $this->dataStorage;
    }

    public function getWayAddresingList() {

        if (is_null($this->wayAddresingList)) {
            $this->buildWayAddresing();
        }

        return $this->wayAddresingList;
    }
    
    public function getServicesList() {
        
         if (is_null($this->servicesList)) {
            $this->buildServicesList();
        }

        return $this->servicesList;
    }

        public function getResponsiblesList() {
        
        if (is_null($this->responsiblesList)) {
            $this->buildResponsiblesList();
        }

        return $this->responsiblesList;     
    }
    
    public function getSolvedByList() {
        
        if (is_null($this->rsolvedByList)) {
            $this->buildSolvedByList();
        }

        return $this->responsiblesList;     
    }
    
    
    private function buildServicesList() {

        $list = [];
        foreach ($this->data->getData() as $item) {
            $list[$item['service']['UUID']] = $item['service']['title'];
        }
        $this->servicesList = $list;
    }

    private function buildWayAddresing() {

        $list = [];
        foreach ($this->data->getData() as $item) {
            $list[$item['wayAddressing']['code']] = $item['wayAddressing']['title'];
        }
        $this->wayAddresingList = $list;
    }

    private function buildResponsiblesList() {

        $list = [];
        foreach ($this->data->getData() as $item) {
            $list[$item['responsible']['UUID']] = $item['responsible']['title'];
        }
        $this->responsiblesList = $list;
    }
    
    private function buildSolvedByList() {

        $list = [];
        foreach ($this->data->getData() as $item) {
            $list[$item['solvedBy']['UUID']] = $item['solvedBy']['title'];
        }
        $this->responsiblesList = $list;
    }

}
