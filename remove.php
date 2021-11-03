<?php
        $path = $_POST['path'];
        $path2=$_POST['path2'];
           // Remove file 
           unlink($path);
           unlink($path2);
?>