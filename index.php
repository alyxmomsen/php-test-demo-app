<?php

use daemon\Router;




require_once "./models/router.php";

$requestUri = $_SERVER['REQUEST_URI'];

var_dump($requestUri);

require_once './views/templates/header.php';
require_once './views/' . Router::process($requestUri);
require_once './views/templates/footer.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    ?>
</body>

</html>

<a href="/bar">go bar</a>
<a href="/foo">go home</a>
<a href="/download">download</a>