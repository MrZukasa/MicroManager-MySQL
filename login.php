<?php
    if (isset($_POST['login'])) {
        $connection = new mysql_connect(host:'localhost',username:'root',password:'', dbname:'dbprova');
        
        
        $email = $connection->real_escape_string($_POST['email']);
        $password = $connection->real_escape_string($_POST['password']);

        $data = $connection->query(query: "SELECT id FROM users WHERE email='$email' AND password='$password'");
        exit($email . " = " . $password);
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
                                console.log(response);
                            },
                            dataType: 'text'
                        })
                    }                
                });
            });
        </script>
    </body>
</html>