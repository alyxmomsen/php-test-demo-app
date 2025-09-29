<?php

$dsn = 'mysql:host=localhost;dbname=testdb;charset=utf8mb4';
$pass = '';
$username = '';


try {

    $pdo = new PDO($dsn, $username, $pass);

    // return $pdo;
} catch (ErrorException $err) {

    // return null;
}
