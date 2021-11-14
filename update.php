<?php

    $id = $_POST['idPHP'];
    $email = $_POST['emailPHP'];
    $nome = $_POST['nomePHP'];
    $password = $_POST['passwordPHP'];
    //leggo i parametri in POST alla pagina PHP

    $connection = new mysqli('localhost', 'root','','dbprova');
    if ($connection->connect_error) {
        trigger_error('Connection failed: ' . $connection->connect_error, E_USER_ERROR);
    }  // apertura connessione al database

    $data = "UPDATE users SET firstName = '$nome', email = '$email', password = '$password' WHERE id = '$id'";
    if ($connection->query($data)===false) {
        echo("Error: " . $connection->error);
    } //query per l'inserimento dei dati dal JSON al database  

?>