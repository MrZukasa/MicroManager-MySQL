<?php

    /*session_start();

    if (isset($_SESSION['loggedIN'])) {
        header('Location:hidden.php');
        exit();
    }*/

    if (isset($_POST['login'])) {
        $connection = new mysqli('localhost', 'root','','dbprova');
        
        $email = $connection->real_escape_string($_POST['emailPHP']);
        $password = $connection->real_escape_string($_POST['passwordPHP']);

        $data = $connection->query("SELECT id FROM users WHERE email='$email' AND password='$password'");
        if ($data->num_rows > 0) {
            $_SESSION['loggedIN'] = '1';
            $_SESSION['email'] = $email;
            exit ('success');
        } else
            exit('failed');
    }
?>

<html>
    <head>
        <title>Login Form</title>
    </head>
    <body>    
        <form method="post" action="login.php">
            <input type="text" id="email" placeholder="Email..."><br>
            <input type="password" id="password" placeholder="Password..."><br>
            <input type="button" id="login" value="Log In">
        </form>

        <p id="response">

        </p>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function (){
                $("#login").click(function (){
                    var email = $("#email").val();
                    var password = $("#password").val();

                    if (email == "" || password == "") {
                        alert("Please check the input field");                        
                    } else {
                        $.ajax({
                            url:'login.php',
                            method:'POST',                  //default is GET
                            data: {
                                login: 1,
                                emailPHP: email,
                                passwordPHP: password
                            },
                            success: function (response){
                                $("#response").html(response);

                                //if (response.indexOf('success') >= 0)
                                    //window.location = 'hidden.php';
                            },
                            dataType: 'text'
                        })
                    }                
                });
            });
        </script>
    </body>
</html>