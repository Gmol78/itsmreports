<?php

/*
 * 
 */

namespace controller\report;

use base\Report;
use base\Request;
use model\filter\FilterDate;
use model\filter\WayAddressing;
use app\Application;

/**
 * Description of ReportWays
 *
 * @author i.molochnikov
 */
class ReportWays extends Report {

    protected $reportName = 'количество заявок по каналам приёма';
    protected $paramsTitle = 'даты создания';
    
    protected $resultTableFields = ['канал приема', 'число заявок'];
    private $dateStart;
    private $dateEnd;

    
    public function build() {

        $sumCases = 0;    
        $findingItems = $this->dataHandler->getWayAddresingList();
        $this->dataHandler->find(new FilterDate('creationDate', $this->dateStart, $this->dateEnd));

        foreach ($findingItems as $code => $name) {

            $handlerWay = clone $this->dataHandler;
            $handlerWay->find(new WayAddressing($code));

            $numCases = count($handlerWay);
            $sumCases += $numCases;

            $this->resultTable[] = [$this->resultTableFields[0] => $name, $this->resultTableFields[1] => $numCases];
        }

        $this->resultTable[] = [$this->resultTableFields[0] => 'все каналы', $this->resultTableFields[1] => $sumCases];
    }

    public function getDateStart() {
        return $this->dateStart;
    }

    public function getDateEnd() {
        return $this->dateEnd;
    }


    public function __construct() {
        
        parent::__construct();        
        $this->dateStart = $this->request->getProperty('date_start');
        $this->dateEnd = $this->request->getProperty('date_end');
    }

}
