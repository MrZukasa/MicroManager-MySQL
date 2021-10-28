<?php
      
      $email = $_POST['emailPHP'];
      $nome = $_POST['nomePHP'];
      $password = $_POST['passwordPHP'];      
      //leggo i parametri in POST alla pagina PHP    

      $myFile = "temp.json";
      $response = array();
      $posts = array();
      $posts[]=array('nome' => $nome, 'password' => $password, 'email' => $email);
      $response['posts'] = $posts;
      $fh = fopen($myFile, 'w') or die("can't open file");
      fwrite($fh, json_encode($posts));
      fclose($fh);
      //funzione per creare JSON file

    
      $path=file_get_contents("temp.json");
      $decoded=json_decode($path,true);
      foreach($decoded as $item){
          $nomeJSON=$item["nome"];
          $emailJSON=$item["email"];
          $passwordJSON=$item["password"];            
      }          
      //lettura dati dal JSON File
    
      $connection = new mysqli('localhost', 'root','','dbprova');
      if ($connection->connect_error) {
          trigger_error('Connection failed: ' . $connection->connect_error, E_USER_ERROR);
      }  // apertura connessione al database

      $data = "INSERT INTO users (firstName, email, password) VALUES ('$nomeJSON','$emailJSON','$passwordJSON');";
      if ($connection->query($data)===false) {
          trigger_error('Query failed: ' . $connection->error, E_USER_ERROR);          
      } //query per l'inserimento dei dati dal JSON al database

      $posts=[];  //inizzializzo la variabile sul quale scrivere
      $data = "SELECT id, firstName, email, password FROM users";
      $result = $connection->query($data);
          while ($row = mysqli_fetch_assoc($result)) {
              $posts[]=$row;
          }      

      $fh = fopen('all.json','w') or die('error');    //creo un JSON temporaneo con tutto il dump del database
      fwrite($fh, json_encode($posts));
      fclose($fh);

      mysqli_free_result($result);
      $connection -> close();
?>