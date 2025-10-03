<?php
echo '<pre>';
var_dump($_FILES['media_file']);

// move_uploaded_file($_FILES['userfile'] , '')
echo '</pre>';

?>
<div>
    <h2>admin page</h2>
    <?php
    require './views/download-video-view/upload-form.php';
    ?>
    <a href="/home">go home</a>
</div>