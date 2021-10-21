$("#insert").click(()=>{            
    var file = new Object();
    file.nome = $("#Nome").val(); 
    file.password = $("#Password").val();
    file.email = $("#Email").val();
    var dati = [];
    dati.push(file);

    if (email == "" || password == "" || nome == "") {
        alert("Please check the input field");                   
    } else {
        $.ajax({
            url: "insert.php",
            type: "POST",
            dataType: "json",
            data: {data:JSON.stringify(dati)},
            success: function(response){
                $("#response").html(response);
            }

        })
    }
})