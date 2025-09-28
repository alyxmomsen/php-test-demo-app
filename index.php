<?php

require_once './router.php';

use daemon\Router;

$querystring = $_SERVER['REQUEST_URI'];

$arrname = '_server';

$uppercased_arrname = 'mb_convert_case'($arrname, MB_CASE_UPPER);

$data1 = $$uppercased_arrname["REQUEST_URI"];

echo "<pre>";
var_dump($querystring, $arrname, $uppercased_arrname, $data1);
echo "</pre>";

Router::process($querystring);
