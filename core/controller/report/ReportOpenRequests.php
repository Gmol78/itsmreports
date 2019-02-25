<?php

/*
 * 
 */

namespace controller\report;

use base\Report;
use model\filter\FilterOpenRequest;
use model\filter\FilterResponsible;
use app\Application;

/**
 * Description of ReportOpenRequest
 *
 * @author i.molochnikov
 */
class ReportOpenRequests extends Report {

    protected $reportName = 'количество открытых заявок по сотрудникам';
    protected $resultTableFields = ['сотрудник', 'число заявок'];
    protected $resultTable = [];

    public function build() {

        $sumCases = 0;

        $respList = $this->dataHandler->getResponsiblesList();
        $this->dataHandler->find(new FilterOpenRequest());

        foreach ($respList as $code => $name) {

            $handlerResp = clone $this->dataHandler;
            $handlerResp->find(new FilterResponsible($code));

            $numCases = count($handlerResp);
            $sumCases += $numCases;

            $this->resultTable[] = [$this->resultTableFields[0] => $name, $this->resultTableFields[1] => $numCases];
        }

        $this->resultTable[] = [$this->resultTableFields[0] => 'итого по отделу', $this->resultTableFields[1] => $sumCases];
    }


}
