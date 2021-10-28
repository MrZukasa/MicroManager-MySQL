$("#insert").click(()=>{
    
    var nome = $("#Nome").val(); 
    var password = $("#Password").val();
    var email = $("#Email").val();
    
    if (email == "" || password == "" || nome == "") {        
        $("#response").html("Please check the input field");
    } else {
        $.ajax({
            url: "insert.php",
            type: "POST",
            async: true,
            //dataType: "json",
            data: {
                emailPHP: email,
                passwordPHP: password,
                nomePHP: nome
            },
            success: function(){
                $("#response").css("color", "green");
                $("#response").html("Success!");
                return;
            },
            failure: function(){
                $("#response").css("color", "red");
                $("#response").html("Failure!");
                return;
            },
            error: function(ex){
                console.log(JSON.stringify(ex));
            }
        });
    };
});

$("#view").click(()=>{    
    $.getJSON("all.json", function(data){
        console.log(data[0].id);
        console.log(data[1].firstName);
        console.log(data[2].email);
        console.log(data[3].password);

    });
})

