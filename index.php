<?php

use daemon\Router;

require_once "./models/router.php";

$requestUri = $_SERVER['REQUEST_URI'];

require_once './views/templates/header.php';
require_once './views/' . Router::process($requestUri);
require_once './views/templates/footer.php';

?>

<a href="/bar">go bar</a>
<a href="/foo">go home</a>
<a href="/download">download</a>