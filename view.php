<?php

    if (isset($_POST['action'])) {
        $connection = new mysqli('localhost', 'root','','dbprova');
        if ($connection->connect_error) {
            trigger_error('Connection failed: ' . $connection->connect_error, E_USER_ERROR);
        }

    // check for POST parameter then open the database connection, also with error checking

        $posts=[];  

        $data = "SELECT id, firstName, email, password FROM users";
        $result = $connection->query($data);

    // execute the query and store the result

        while ($row = mysqli_fetch_assoc($result)) {
            $posts[]=$row;            
        }

    // fetch the result in each row then push the row in a new array

        $fh = fopen('all.json','w') or die('error');
        fwrite($fh, json_encode($posts, JSON_UNESCAPED_UNICODE));
        fclose($fh);

    // make a temporary JSON file with the dump of the database

        mysqli_free_result($result);
        $connection -> close();
        } else {
            echo "Error";
        }

    // close the connection to database

?>