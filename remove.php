<?php
        $path = $_POST['path'];
        $path2=$_POST['path2'];
        $otherpage=file_get_contents("index.html");

        if ((file_exists($path))&&(file_exists($path2))) {
                unlink($path);
                unlink($path2);
                echo "<p>Removed!</p>";
        } else {
                echo str_replace("<p>No file need to be removed!</p>",$otherpage);
        }
?>