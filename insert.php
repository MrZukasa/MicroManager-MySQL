<?php
      $myFile = "temp.json";
      $response = array();
      $posts = array();

      $email = $_POST['emailPHP'];
      $nome = $_POST['nomePHP'];
      $password = $_POST['passwordPHP'];

      $posts[]=array('nome' => $nome, 'password' => $password, 'email' => $email);
      $response['posts'] = $posts;     

      $fh = fopen($myFile, 'w') or die("can't open file");
      fwrite($fh, json_encode($posts));
      fclose($fh);

      $connection = new mysqli('localhost', 'root','','dbprova');
      if ($connection->connect_error) {
          trigger_error('Connection failed: ' . $connection->connect_error, E_USER_ERROR);
      }

      $data = "INSERT INTO users (firstName, email, password) VALUES ('$nome','$email','$password');";
      if ($connection->query($data)===false) {
          trigger_error('Query failed: ' . $connection->error, E_USER_ERROR);          
      }

      $mysqli -> close();      
?>