<?php

if (isset($_POST['action'])) {
    $connection = new mysqli('localhost', 'root','','dbprova');
    if ($connection->connect_error) {
          trigger_error('Connection failed: ' . $connection->connect_error, E_USER_ERROR);
    }  // apertura connessione al database

$posts=[];  //inizzializzo la variabile sul quale scrivere
$data = "SELECT id, firstName, email, password FROM users";
$result = $connection->query($data);
    while ($row = mysqli_fetch_assoc($result)) {
      $posts[]=$row;
    }

$fh = fopen('all.json','w') or die('error');    //creo un JSON temporaneo con tutto il dump del database      
fwrite($fh, json_encode($posts, JSON_UNESCAPED_UNICODE));
fclose($fh);

mysqli_free_result($result);
$connection -> close();
} else {
    echo "Error";
}

?>