   
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   <!-- viewport orientation-->
    <meta name="description" content=""> <!-- description -->
    <meta name="author" content="">      <!-- author name -->   
    <meta name="generator" content="">   <!-- describe the generator -->
    
    <!--<link href="fontawesome-free-5.15.3-web/css/all.css" rel="stylesheet">         <!-- link to css Third Party-->    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >    <!-- link to Third Party css {bootstrap}-->
    <link rel="stylesheet" type="text/css" href="style.css">                       <!-- link to mine CSS -->
    
    <title> Insert into JSON then into MySQL DB</title>
  </head>
  <body>
        
    <form name="field" action="insert.php" method="post">
        
          <label>Nome: </label> <input id="Nome" placeholder="Name">
          <label>Email: </label> <input id="Email" placeholder="example@provider.com">
          <label>Password: </label> <input id="Password" placeholder="Password">
        <br>
        <p>
            <button type="button" id="insert">Insert</button>
            <button type="button" id="view">View</button>
            <button type="button" id="delete">Delete</button>
            <button type="button" id="update">Update</button>
        </p>

    </form>
    
    <p id="response"></p>
    <table id="tabella"></table>

      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>              <!-- link to JQUERY libary -->
      <script type="text/javascript" src="script.js"></script>                                              <!-- link to a external script.js -->
      <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> -->  <!-- link to Bootstrap Bundle Framework -->
  </body>
</html>