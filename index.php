<?php

require_once './router.php';


require_once './index.routing.php';

use daemon\Router;

$requesturi = $_SERVER['REQUEST_URI'];

echo $requesturi;

$arrname = '_server';

$uppercased_arrname = 'mb_convert_case'($arrname, MB_CASE_UPPER);

$data1 = $$uppercased_arrname["REQUEST_URI"];


echo "<pre>";
var_dump($requesturi, $arrname, $uppercased_arrname, $data1);
echo "</pre>";

Router::process($requesturi);

require_once('./views/upload-form.php');
// require_once('./db.php');
