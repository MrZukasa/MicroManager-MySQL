<?php
      
      $email = $_POST['emailPHP'];
      $nome = $_POST['nomePHP'];
      $password = $_POST['passwordPHP'];
      //catch POST parameter from the JS script

    //   $myFile = "temp.json";
    //   $response = array();
    //   $posts = array();
    //   $posts[]=array('nome' => $nome, 'password' => $password, 'email' => $email);
    //   $response['posts'] = $posts;
    //   $fh = fopen($myFile, 'w') or die("can't open file");
    //   fwrite($fh, json_encode($posts));
    //   fclose($fh);
    //*make JSON file

    
    //   $path=file_get_contents("temp.json");
    //   $decoded=json_decode($path,true);
    //   foreach($decoded as $item){
    //       $nomeJSON=$item["nome"];
    //       $emailJSON=$item["email"];
    //       $passwordJSON=$item["password"];
    //   }
    //*read JSON file
    
      $connection = new mysqli('localhost', 'root','','dbprova');
      if ($connection->connect_error) {
          trigger_error('Connection failed: ' . $connection->connect_error, E_USER_ERROR);
      }
      // open the connection with the DB and check if there is some errors

      $data = "INSERT INTO users (firstName, email, password) VALUES ('$nome','$email','$password')";
      if ($connection->query($data)===false) {
          echo("Error: " . $connection->error);
      }
      // execute the query for the insertion into the DB and check for errors
?>