<?php



$itsm = new \SoapClient('https://servicecloud.itsm365.com/sd/soap/soapService.wsdl', array('trace' => 1, 'exceptions' => true));
echo '<pre>';
print_r($itsm->__getFunctions());
echo '</pre>';


$data = [
    'accessKey' => '14676306-d0f3-49b9-8300-77e0740c8bd3',
    'uuid' => 'employee$2279982'   
];

$itsm->Get($data);


echo '<pre>';
echo $itsm->__getLastRequestHeaders();
echo '</pre>';

echo '<hr>';

echo '<pre>';
echo $itsm->__getLastRequest();
echo '</pre>';



echo '<pre>';
echo $itsm->__getLastResponse();
echo '</pre>';

/*

<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="http://naumen.ru/soap/server">
    <SOAP-ENV:Body>
        <ns1:GetRequest>
            <ns1:accessKey>14676306-d0f3-49b9-8300-77e0740c8bd3</ns1:accessKey>
            <ns1:uuid>employee$2279982</ns1:uuid>
        </ns1:GetRequest>
    </SOAP-ENV:Body>
</SOAP-ENV:Envelope>

<env:Envelope xmlns:env="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="http://naumen.ru/soap/server" >

*/