<form action="/controllers/upload.javascript.php" method="post" enctype="multipart/form-data">

    <input type="hidden" name="MAX_FILE_SIZE" value="52428800" />

    <label for="media_file">Выберите файл (фото, видео, аудио):</label>
    <input type="file" name="media_file" id="media_file" required>

    <label for="title">Название:</label>
    <input type="text" name="title" id="title">
    <input type="submit" value="go">
</form>
<div>
    <input placeholder="type" type="text" name="title-to-upload" id="title-to-upload">
</div>