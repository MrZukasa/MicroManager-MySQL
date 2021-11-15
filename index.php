<!DOCTYPE PHP>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   <!-- viewport orientation-->
    <meta name="description" content=""> <!-- description -->
    <meta name="author" content="">      <!-- author name -->   
    <meta name="generator" content="">   <!-- describe the generator -->
    
    <!--<link href="fontawesome-free-5.15.3-web/css/all.css" rel="stylesheet">         <!-- link to css Third Party-->    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >    <!-- link to Third Party css {bootstrap}-->    
    <link rel="stylesheet" type="text/css" href="style.css">                       <!-- link to mine CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link href="https://img.icons8.com/nolan/64/github.png" rel="icon" type="image/png" />
    
    <title> Insert into JSON then into MySQL DB</title>
  </head>
  <body class="bg-dark bg-opacity-10">

  <div class="card text-center bg-dark bg-opacity-10 text-dark text-opacity-75">
    <h5 class="card-header">Insert / Read / Delete / Update Data from DB</h5>      
  </div>

  <div class="container-lg mt-5">
    <form name="field" action="insert.php" method="post">
      <div class="row">
        <div class="col">
          <input id="Id" class="form-control" type="text" placeholder="ID" readonly>
        </div>
        <div class="col">
          <input id="Nome" class="form-control" type="text" placeholder="Nome">          
        </div>
        <div class="col">
          <input id="Email" placeholder="Email" class="form-control" type="email">
        </div>
        <div class="col">
          <div class="input-group mb-3">
            <input id="Password" placeholder="Password" class="form-control" type="password">
              <button class="btn btn-outline-secondary" type="button" id="seepassword">
                <i class="bi bi-eye" id="occhio"></i>
              </button>
          </div>
        </div>
      </div>
      <div class="row justify-content-md-center mt-3">
        <div class="col-md-auto">
          <button type="button" id="insert" class="btn btn-outline-primary">Insert</button>
          <button type="button" id="view" class="btn btn-outline-primary">View</button>
          <button type="button" id="delete" class="btn btn-outline-danger">Delete</button>
          <button type="button" id="update" class="btn btn-outline-primary">Update</button>
        </div>
      </div>
      <div class="row justify-content-md-center mt-3">
        <div id="response" class="text-center alert" role="alert"></div>
      </div>
      <div class="row justify-content-md-center mt-3">
        <div class="table-responsive">
          <table class="table table-hover table-striped table-sm" id="tabella" style="display: none">                    
            <caption>Click on a row to Edit/Delete</caption>
              <thead class="table-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">ID</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Password</th>
              </thead>
            <tbody>
              <!-- data from the DB here -->
            </tbody>
          </table>
        </div>
      </div>
    </form>
  </div>

            <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>              <!-- link to JQUERY libary -->
    <script type="text/javascript" src="script.js"></script>                                              <!-- link to a external script.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>  <!-- link to Bootstrap Bundle Framework -->
  </body>
</html>