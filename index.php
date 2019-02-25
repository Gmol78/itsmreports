<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/core/exception/FileException.php';

function itsmItAutoload( $className ) {
	$root      = $_SERVER['DOCUMENT_ROOT'];
	$classNameRepl = str_replace( '\\', DIRECTORY_SEPARATOR, $className );
	$path      = $root . '/core/' . $classNameRepl . '.php';
	if ( file_exists( $path ) ) {
		require_once $path;
	} else {
            throw new \exception\FileException($classNameRepl);
	}

}

spl_autoload_register( 'itsmItAutoload' );

use app\Application;

$app = Application::instance();

$handler = $app->getDataHandler();

var_dump($handler->getServicesList());

//$handler->find(new \model\filter\FilterResumed());

//var_dump($handler->getResult());

$req = $app->getRequest();
$req->setProperty('date_start', '10.01.2019');
$req->setProperty('date_end', '21.02.2019');

$req->setProperty('report_done_date_start', '10.01.2019');
$req->setProperty('report_done_date_end', '21.02.2019');

$req->setProperty('report_serv_date_start', '07.06.2018');
$req->setProperty('report_serv_date_end', '22.02.2019');




$report = new \controller\report\ReportWays();
$report->build();
$report->renderReport('report_table');

echo '<br>';
echo '<br>';

$rep = new \controller\report\ReportOpenRequests();
$rep->build();
$rep->renderReport('report_table');

echo '<br>';
echo '<br>';

$rep2 = new \controller\report\ReportDone();
$rep2->build();
$rep2->renderReport('report_table');

echo '<br>';
echo '<br>';

$rep3 = new \controller\report\ReportRequestsByServices();
$rep3->build();
$rep3->renderReport('report_table');
 


























