<?php

/*
 * 
 */

namespace base;

use app\Application;

/**
 * Description of Report
 *
 * @author i.molochnikov
 */
abstract class Report {

    protected $templateDir = 'core/views/';
    protected $reportName = '';
    protected $paramsTitle = '';
    protected $resultTableFields = [];
    protected $resultTable = [];
    
    protected $dataHandler = null;
    protected $request = null;


    abstract public function build();

    public function __construct() {
        $app = Application::instance();
        $this->dataHandler = $app->getDataHandler();
        $this->request = $app->getRequest();
    }

    public function getReportName() {
        return $this->reportName;
    }

    public function getResultTableFields() {
        return $this->resultTableFields;
    }

    public function getResultTable() {
        return $this->resultTable;
    }

    public function getParamsTitle() {
        return $this->paramsTitle;
    }

    public function renderReport($templateName) {
        include $this->templateDir . $templateName . '.php';
    }

}
