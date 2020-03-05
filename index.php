<?php
require_once 'vendor/autoload.php';
require_once './config.php';

use Services\XmlReportWriter;


switch ($_SERVER['REQUEST_METHOD']){

    case "POST":
        $writer = new XmlReportWriter();
        $writer->generate($_POST, TEMPLATE_FILE_PATH, RESULT_FILENAME, RESULT_FILE_PATH)
            ->download();
        break;
    case "GET":
        require './front/default.php';
}








