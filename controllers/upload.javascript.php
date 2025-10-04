<?php
// Отключить отображение ошибок на экране
// ini_set('display_errors', 0);
// Включить запись ошибок в лог-файл
// ini_set('log_errors', 1);
// Указать, куда писать ошибки (имя файла относительно текущего скрипта)
// ini_set('error_log', 'php_upload_errors.log');
header('Content-Type: application/json');
function foo()
{

    $var = $_FILES['media_file'];
    try {
        $var = $_FILES['media_file'];
        // var_dump($var);
        // return $var;
    } catch (Exception $e) {
        // return $e;
    }
}
// foo();
echo json_encode(['foo bar' => 'baz']);
exit;
