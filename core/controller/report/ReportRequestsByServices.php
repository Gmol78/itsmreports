<?php

/*
 * 
 */

namespace controller\report;

use model\filter\FilterDate;
use model\filter\FilterServiceItem;
use base\Report;

/**
 * Description of ReportDone
 *
 * @author i.molochnikov
 */
class ReportRequestsByServices extends Report {
    
    protected $reportName = 'число заявок по типам услуг';
    protected $paramsTitle = 'даты создания';
    
    protected $resultTableFields = ['тип услуги', 'число заявок'];
    private $dateStart;
    private $dateEnd;

    
    public function build() {

        $sumCases = 0;    
        $findingItems = $this->dataHandler->getServicesList();
       
        $this->dataHandler->find(new FilterDate('creationDate', $this->dateStart, $this->dateEnd));
        
        foreach ($findingItems as $code => $name) {

            $handlerServ = clone $this->dataHandler;
            $handlerServ->find(new FilterServiceItem($code));

            $numCases = count($handlerServ);
            $sumCases += $numCases;

            $this->resultTable[] = [$this->resultTableFields[0] => $name, $this->resultTableFields[1] => $numCases];
        }

        $this->resultTable[] = [$this->resultTableFields[0] => 'итого', $this->resultTableFields[1] => $sumCases];
    }

    public function getDateStart() {
        return $this->dateStart;
    }

    public function getDateEnd() {
        return $this->dateEnd;
    }


    public function __construct() {
        
        parent::__construct();        
        $this->dateStart = $this->request->getProperty('report_serv_date_start');
        $this->dateEnd = $this->request->getProperty('report_serv_date_end');
    }    
}
