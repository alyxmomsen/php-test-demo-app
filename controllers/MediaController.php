<?php
// MediaController.php

class MediaController
{

    private $db;
    private $upload_dir = 'public/uploads/media/'; // Папка для хранения файлов

    public function __construct(/* PDO $pdo */)
    {
        // $this->db = $pdo;
        // // Убедитесь, что папка загрузки существует!
        // if (!is_dir($this->upload_dir)) {
        //     mkdir($this->upload_dir, 0777, true);
        // }
    }

    public function upload()
    {
        // 1. Проверка, был ли файл вообще отправлен
        if (empty($_FILES['media_file'])) {
            // Ошибка: Файл не был загружен
            return ['error' => 'Файл не был выбран.'];
        }

        $file = $_FILES['media_file'];

        // 2. Проверка ошибок загрузки
        if ($file['error'] !== UPLOAD_ERR_OK) {
            // Здесь можно обработать различные ошибки UPLOAD_ERR_...
            return ['error' => 'Ошибка загрузки файла. Код: ' . $file['error']];
        }

        // 3. Валидация (Размер и Тип)
        $max_size = 50 * 1024 * 1024; // 50 МБ
        if ($file['size'] > $max_size) {
            return ['error' => 'Размер файла превышает 50 МБ.'];
        }

        $allowed_mime_types = [
            'image/jpeg',
            'image/png',
            'image/gif',
            'video/mp4',
            'video/webm',
            'audio/mpeg',
            'audio/wav'
        ];

        // Получаем MIME-тип файла, это БОЛЕЕ БЕЗОПАСНО, чем $file['type']
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime_type = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);

        if (!in_array($mime_type, $allowed_mime_types)) {
            return ['error' => 'Недопустимый тип файла: ' . $mime_type];
        }

        // 4. Генерация Уникального Имени Файла
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        // Создаем уникальное имя, чтобы избежать перезаписи
        $new_filename = uniqid('media_', true) . '.' . $extension;
        $destination = $this->upload_dir . $new_filename;

        // 5. Перемещение файла
        // ВАЖНО: move_uploaded_file() - единственный безопасный способ переместить файл
        if (move_uploaded_file($file['tmp_name'], $destination)) {

            // 6. Запись метаданных в БД
            $title = $_POST['title'] ?? $file['name'];
            $file_path = '/' . $destination; // Путь, который будет использоваться в HTML

            $this->saveToDatabase($new_filename, $file_path, $title, $mime_type);

            return ['success' => 'Файл успешно загружен!', 'path' => $file_path];
        } else {
            return ['error' => 'Не удалось переместить файл. Проверьте права доступа.'];
        }
    }

    // ... Другие методы контроллера (например, saveToDatabase)
    private function saveToDatabase(string $filename, string $path, string $title, string $mime_type)
    {
        $sql = "INSERT INTO media (filename, path, title, mime_type, uploaded_at) 
                VALUES (:filename, :path, :title, :mime_type, NOW())";

        // $stmt = $this->db->prepare($sql);
        // $stmt->execute([
        //     'filename' => $filename,
        //     'path' => $path,
        //     'title' => $title,
        //     'mime_type' => $mime_type
        // ]);
        // return $this->db->lastInsertId();
    }
}
