<?php

ob_get_clean();
ob_start();

require_once './models/handlers/MyStringHandler.php';

$myobj = new MyStingAdder();

$myobj->addStringContent('this is the string');
$myobj->addStringContent('hello world mother fucker');

echo $myobj->getString();
