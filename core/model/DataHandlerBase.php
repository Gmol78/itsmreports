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
    private $wayAddresingList = [];
    private $responsiblesList = [];
    private $solvedByList = [];
    private $servicesList = [];
    private $marksList = [];

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

        if (empty($this->wayAddresingList)) {
            $this->buildWayAddresing();
        }

        return $this->wayAddresingList;
    }

    public function getServicesList() {

        if (empty($this->servicesList)) {
            $this->buildServicesList();
        }

        return $this->servicesList;
    }

    public function getResponsiblesList() {

        if (empty($this->responsiblesList)) {
            $this->buildResponsiblesList();
        }

        return $this->responsiblesList;
    }

    public function getSolvedByList() {

        if (empty($this->solvedByList)) {
            $this->buildSolvedByList();
        }

        return $this->responsiblesList;
    }

    public function getMarksList() {
        if (empty($this->marksList)) {
            $this->buildMarksList();
        }
        return $this->marksList;
    }

    private function buildMarksList() {

        $list = [];
        foreach ($this->data->getData() as $item) {
            $list[$item['mark']['UUID']] = $item['mark']['title'];
        }
        $this->servicesList = $list;
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
