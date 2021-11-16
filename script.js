/* function that allow the user to insert a singular record into the DB */
$("#insert").click(()=>{
    
    /* initialize some variable in order to get the value from the JS */

    var nome = $("#Nome").val();
    var password = $("#Password").val();
    var email = $("#Email").val();
    
    // check if the fields are ok

    if ($(".form-control").val()=="") {
        $("#response").attr("class", "text-center alert alert-danger col-md-8");
        $("#response").hide().html("Please check the input field!").fadeIn(200).delay(2000).fadeOut(200);
    } else {

        /*if the fields are ok then i make an ajax POST request in order to insert the data into the DB */

        $.ajax({
            url: "insert.php",
            method: "POST",
            async: true,            
            data: {
                emailPHP: email,
                passwordPHP: password,
                nomePHP: nome
            },
            success: function(data){
                $("#response").attr("class","text-center alert alert-success col-md-8");
                $("#response").hide().html("Success! " + data).fadeIn(200).delay(2000).fadeOut(200);
            },
            failure: function(data){
                $("#response").attr("class","text-center alert alert-danger col-md-8");
                $("#response").hide().html("Failure! " +data).fadeIn(200).delay(2000).fadeOut(200);
            }
        });
        // empty the input box
        $(".form-control").val("");
    };
});

// #########################################################################################################################

/* function that handles all the record from the DB and put them into a table */
$("#view").click(()=>{

    // empty the input box
    $(".form-control").val("");

    // i make an ajax POST request in order to get the data from the database

    $.ajax({
        url: "view.php",
        method: "POST",
        async: true,
        data: {action:'action'},
        success: function(response){

            //* first of all i need to remove the attribute Styles from the table in order to make it visible

            $("#tabella").removeAttr("style");

            //* declare and initialize a couple of variables

             var tabella ="";
             var riga="";

            // get the JSON data which contains the dump of all the database records from the PHP page 

             $.getJSON("all.json", function(data){

                // cycling each data in order to create the single record row

                 $.each(data, (i,record)=>{

                    //  format a single record in order to make it fit into the table

                     riga = '<td class="firstName">'+record.id+'</td><td class="firstName">'+record.firstName+'</td><td class="email">'+record.email+'</td><td class="password">'+record.password+'</td>';
                     tabella += "<tr><th scope='row'>"+(i+1)+"</th>"+riga+"</tr>";                    
                 });
                //*  write down the whole table content
                 $("#tabella tbody").hide().html(tabella).fadeIn(200);
             });
            //* set an alert with success message
             $("#response").attr("class","text-center alert alert-success col-md-8");
             $("#response").hide().html("Success! "+response).fadeIn(200).delay(2000).fadeOut(200);
        },
        failure: function(data){
            //* set an alert with failure message
            $("#response").attr("class","text-center alert alert-danger col-md-8");
            $("#response").hide().html("Failure! "+data).fadeIn(200).delay(2000).fadeOut(200);
        }
    });    
});

//! ##########################################################################################################################

//* function that allow the user to delete the selected record from the DB */
$("#delete").click(()=>{
    
    //* get the ID value from JS
    var id = $("#Id").val();
    
    //* make a POST AJAX call with ID as parameter in order to allows the user to delete the selected record
    $("#tabella").fadeOut(200);
    $.ajax({
        url:"remove.php",
        method:"POST",
        async: true,
        data: {
            path:'all.json',
            path2:"temp.json",
            idPHP: id
        },
        success: function(data){
            //*  set an alert with success message
            $("#response").attr("class","text-center alert alert-success col-md-8");
            $("#response").hide().html(data).fadeIn(200).delay(2000).fadeOut(200);            
        },
        failure: function(data){
            //*  set an alert with failure message
            $("#response").attr("class","text-center alert alert-danger col-md-8");
            $("#response").hide().html(data).fadeIn(200).delay(2000).fadeOut(200);            
        }
    });
    //* empty the input box
    $(".form-control").val("");
});

//! ###########################################################################################################################

//* function that allow the user to select one singular record via clicking it on the table */
$("#tabella").on("click","tr", function(){

    //* identify the TD tag of the clicked record
    var row = $(this).children("td");
    var arr=[];

    //* split each record of the selected row in a fresh array
    row.each(function(i,o){
        arr[i]=$(o).text();
    });

    //* print the value in the input box

    $("#Id").val(arr[0]);
    $("#Nome").val(arr[1]);
    $("#Email").val(arr[2]);
    $("#Password").val(arr[3]);
});

//* function that allow the user to modify one record already present into the DB */
$("#update").click(()=>{

    //* initialize some variable in order to get the value from the JS */

    var nome = $("#Nome").val(); 
    var password = $("#Password").val();
    var email = $("#Email").val();
    var id = $("#Id").val();

    //*check if the fields are ok

    if ($(".form-control").val()!=""){
        $.ajax({
            url:"update.php",
            method:"POST",
            async: true,
            data: {
                idPHP: id,
                emailPHP: email,
                passwordPHP: password,
                nomePHP: nome
            },
            success: function(){
                $("#response").attr("class","text-center alert alert-success col-md-8");
                $("#response").hide().html("Success!").fadeIn(200).delay(2000).fadeOut(200);            
            },
            failure: function(data){
                $("#response").attr("class","text-center alert alert-danger col-md-8");
                $("#response").hide().html(data).fadeIn(200).delay(2000).fadeOut(200);
            }
        });
    } else {
        $("#response").attr("class","text-center alert alert-danger col-md-8");
        $("#response").hide().html("Nothing to update!").fadeIn(200).delay(2000).fadeOut(200);
    }
    $(".form-control").val("");
});

$("#seepassword").click(()=>{
    if($("#Password").attr("type")=="password") {        
        $("#Password").attr("type","text");
        $("#occhio").attr("class","bi bi-eye-slash");        
    } else {        
        $("#Password").attr("type","password");
        $("#occhio").attr("class","bi bi-eye");        
    }
});