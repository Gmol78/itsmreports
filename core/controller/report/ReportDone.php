<?php

/*
 * 
 */

namespace controller\report;

use model\filter\FilterDate;
use model\filter\FilterDoneRequest;
use model\filter\FilterSolvedBy;
use base\Report;

/**
 * Description of ReportDone
 *
 * @author i.molochnikov
 */
class ReportDone extends Report {
    
    protected $reportName = 'выполненные и закрытые заявки по сотрудникам';
    protected $paramsTitle = 'даты решения';
    
    protected $resultTableFields = ['сотрудник', 'число заявок'];
    private $dateStart;
    private $dateEnd;

    
    public function build() {

        $sumCases = 0;    
        $findingItems = $this->dataHandler->getSolvedByList();
        
        $this->dataHandler->find(new FilterDoneRequest());
        $this->dataHandler->find(new FilterDate('dateDecision', $this->dateStart, $this->dateEnd));
        

        foreach ($findingItems as $code => $name) {

            $handlerSolv = clone $this->dataHandler;
            $handlerSolv->find(new FilterSolvedBy($code));

            $numCases = count($handlerSolv);
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
        $this->dateStart = $this->request->getProperty('report_done_date_start');
        $this->dateEnd = $this->request->getProperty('report_done_date_end');
    }    
}
