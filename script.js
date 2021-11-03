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
    var tabella ="";
    var riga="";
    $.getJSON("all.json", function(data){
        $.each(data, (i,record)=>{
            console.log(record);
            riga = "<td>"+record.id+"</td><td>"+record.firstName+"</td><td>"+record.email+"</td><td>"+record.password+"</td>";
            tabella += "<tr>"+riga+"</tr>";
            $("#tabella").html(tabella);
        });
    });
});

$("#delete").click(()=>{
    $.ajax({
        url:"remove.php",
        type:"POST",
        async: true,
        data: {path:'all.json',path2:"temp.json"},
        success: function(){
            $("#response").css("color", "green");
            $("#response").html("Success!");
            return;
        },
        failure: function(){
            $("#response").css("color", "red");
            $("#response").html("Failure!");
            return;
        }
    });
});