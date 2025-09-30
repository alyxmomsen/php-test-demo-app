<?php

// 1. Установите имя файла
$filename = 'video1244471871.mp4';
$filepath = __DIR__ . '/' . $filename;
return;
echo $filepath;

// 2. Проверка существования файла
if (!file_exists($filepath)) {
    // Если файла нет, отправляем ошибку 404
    // http_response_code(404);
    die('Ошибка: Файл не найден.');
}

// 3. Устанавливаем необходимые HTTP-заголовки для скачивания
header('Content-Description: File Transfer');
// Устанавливаем MIME-тип. 'application/octet-stream' подходит для любых бинарных файлов.
// Для MP4 можно использовать 'video/mp4', но 'octet-stream' надежнее для принудительного скачивания.
header('Content-Type: application/octet-stream');
// Указываем браузеру, что файл нужно СКАЧАТЬ (attachment), а не отобразить.
header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
// Указываем размер файла в байтах
header('Content-Length: ' . filesize($filepath));

// 4. Очищаем буфер вывода (важно, чтобы не было "мусора" до заголовков)
ob_clean();
flush();

// 5. Выводим содержимое файла в поток
readfile($filepath);
exit;
