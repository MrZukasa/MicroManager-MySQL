$("#insert").click(()=>{
    
    var nome = $("#Nome").val(); 
    var password = $("#Password").val();
    var email = $("#Email").val();
    
    if (email == "" || password == "" || nome == "") {
        $("#response").css("color", "red");
        $("#response").hide().html("Please check the input field!").fadeIn(200).delay(2000).fadeOut(200);
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
                $("#response").hide().html("Success!").fadeIn(200).delay(2000).fadeOut(200);
                return;
            },
            failure: function(){
                $("#response").css("color", "red");
                $("#response").hide().html("Failure!").fadeIn(200).delay(2000).fadeOut(200);
                return;
            },
            error: function(ex){
                console.log(JSON.stringify(ex));
            }
        });
    };
});

$("#view").click(()=>{
    $.ajax({
        url: "view.php",
        type: "POST",
        async: true,
        data: {action:'action'},
        success: function(){
             var tabella ="";
             var riga="";
             $.getJSON("all.json", function(data){
                 $.each(data, (i,record)=>{
                     console.log(record);
                     riga = '<td class="id">'+record.id+'</td><td class="firstName">'+record.firstName+'</td><td class="email">'+record.email+'</td><td class="password">'+record.password+'</td>';
                     tabella += "<tr>"+riga+"</tr>";
                     $("#tabella").hide().html(tabella).fadeIn(200);
                 });
             });
        },
        failure: function(){
            $("#response").css("color", "red");
            $("#response").hide().html("Error!").fadeIn(200).delay(2000).fadeOut(200);
        }
    });    
});

$("#delete").click(()=>{
    $("#tabella").fadeOut(200);    
    $.ajax({
        url:"remove.php",
        type:"POST",
        async: true,
        data: {path:'all.json',path2:"temp.json"},
        success: function(){
            $("#response").css("color", "green");
            $("#response").hide().html("Success!").fadeIn(200).delay(2000).fadeOut(200);            
        }
    });    
});

$("#tabella").on("click","tr", function(){
    var tds = $(this).find("td");    
    tds.each(function(i,o){
        $("#Nome").val($(o).attr("firstName").text());
    });    
});