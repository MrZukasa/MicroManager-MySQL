<?php

    $id = $_POST['idPHP'];
    $email = $_POST['emailPHP'];
    $nome = $_POST['nomePHP'];
    $password = $_POST['passwordPHP'];
    //read POST parameter from the JS script

    $connection = new mysqli('localhost', 'root','','dbprova');
    if ($connection->connect_error) {
        trigger_error('Connection failed: ' . $connection->connect_error, E_USER_ERROR);
    }
    // open connection to the database and check for errors

    $data = "UPDATE users SET firstName = '$nome', email = '$email', password = '$password' WHERE id = '$id'";
    if ($connection->query($data)===false) {
        echo("Error: " . $connection->error);
    }
    // execute the query and check for errors

?>