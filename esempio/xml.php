<?php
$i = 0;
$nomeFile = "xmlbase.xml";
$XML = simplexml_load_file($nomeFile);

if ($_REQUEST['q'] == 'xml') {
    header('Content-Type: text/xml');
    echo $XML->asXML();
    exit();
    
}
$logins = $XML->logins;
?>

