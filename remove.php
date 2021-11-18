<?php
        $path = $_POST['path'];
        $id = $_POST['idPHP'];

        // catch POST parameter from the JS script        

        if ((file_exists($path))) {
                unlink($path);
                echo "Removed!";
        } else {
                echo "No file need to be removed!";
        }

        // check if there is JSON file that need to be removed

        $connection = new mysqli('localhost', 'root','','dbprova');
        if ($connection->connect_error) {
                trigger_error('Connection failed: ' . $connection->connect_error, E_USER_ERROR);
        }
        // open the connection with the DB and check if there is some errors

        $data = "DELETE FROM users WHERE id = '$id'";
        if ($connection->query($data)===false) {
                echo("Error: " . $connection->error);
        }
        // execute the query for the insertion into the DB and check for errors

?>