<?php
// index.php

// 1. Получаем запрошенный URI (например, '/admin/media/upload')
$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

// 2. Определяем метод запроса (GET или POST)
$method = $_SERVER['REQUEST_METHOD'];

// 3. Разделяем URI на части (admin, media, upload)
$uri_parts = explode('/', $uri);

// Простая логика маршрутизации (для примера):
$controller_name = !empty($uri_parts[0]) ? ucfirst($uri_parts[0]) . 'Controller' : 'HomeController';
$action_name     = !empty($uri_parts[1]) ? $uri_parts[1] : 'index';

// В вашем случае:
// $uri_parts[0] будет 'admin'
// $uri_parts[1] будет 'media'
// $uri_parts[2] будет 'upload' -> Мы можем использовать его для выбора действия.

// 4. Реальная маршрутизация для '/admin/media/upload'
if ($uri === 'admin/media/upload' && $method === 'POST') {
    // 4.1. Подключаем нужный класс контроллера
    require_once 'controllers/MediaController.php';

    // 4.2. Создаем экземпляр контроллера (с подключением к БД)
    // $pdo = new PDO('mysql:host=127.0.0.1;dbname=your_db_name', 'root', 'your_password');
    $controller = new MediaController(/* $pdo */);

    // 4.3. Вызываем метод, который обрабатывает загрузку
    $result = $controller->upload();

    // 4.4. Обработка результата (например, перенаправление или вывод сообщения)
    if (isset($result['success'])) {
        header('Location: /admin/media/list?status=success'); // Перенаправление после успешной POST-операции (Post/Redirect/Get pattern)
        exit;
    } else {
        // Вывод ошибки или загрузка View с ошибкой
        echo "Ошибка: " . $result['error'];
    }
} elseif ($uri === 'admin/media/upload' && $method === 'GET') {
    // Если это GET-запрос, просто показываем форму
    require 'views/media_upload_view.php';
}
// ... Другие маршруты ...
