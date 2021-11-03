<?php
    ini_set('display_errors',1);
    ini_set('display_startup_erros',1);
    error_reporting(E_ALL);

    header('Content-Type: application/json; charset=utf-8');

    require_once('XML2Json.class.php');

    $xml = '<books><title>The Chronicles of Narnia</title><title>The Chronicles of Narnia</title></books>';
    $xml2json = new XML2Json();
    $json = $xml2json->convert($xml);
    echo $json;
?>