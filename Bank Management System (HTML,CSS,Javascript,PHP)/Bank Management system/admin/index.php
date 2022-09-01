<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="../bootstrap-3.3.5-dist/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

     <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="#" class="navbar-brand">Admin</a>

               </div>


               <ul class="nav navbar-nav">
               <li><a href="dashboard.php"><span class="glyphicon glyphicon-stats"></span> Dashboard</a></li>
                    <li class="active"><a href="index.php"><span class="glyphicon glyphicon-th-large"></span> Add Branch</a></li>
                    <li><a href="showbranches.php"><span class="glyphicon glyphicon-eye-open"></span> Show Branches</a></li>
                    <li><a href="users.php"><span class="glyphicon glyphicon-user"></span> Users</a></li>
                    <li><a href="loan.php"><span class="glyphicon glyphicon-tasks"></span> Loan Request</a></li>
               </ul>
            </div>
        </div>
    </nav>


    <div class="container" style="max-width: 500px;min-width:400px;border-radius: 10px;box-shadow: 2px 3px 3px 3px rgba(0,0,0,0.3);padding: 20px 20px;">
        <h3 style="text-align:center">Register!</h3>
          <form id="'form" method="post" action="addbranch.php" >
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-plus"></i></span>
                <input id="email" type="text" class="form-control" name="number" placeholder="Branch Number">
              </div>
  
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                <input id="password" type="text" class="form-control" name="city" placeholder="Branch City">
              </div>
  
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-road"></i></span>
                  <input id="password" type="text" class="form-control" name="address" placeholder="Branch Address">
                </div>
  
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                  <input id="password" type="date" class="form-control" name="date" placeholder="Date of Opening">
                </div>
  
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                  <input id="password" type="text" class="form-control" name="province" placeholder="Province">
                </div>
                <br>
  
                <?php
            if(!empty($_GET)){
              echo "<div class='alert alert-danger'>
              <strong>Error</strong>
              ".$_GET['error']."
          </div>";
            }
            ?>
                
  
              <br>
              <button class="btn btn-success">Sign Up</button>
            </form>
      </div>

      <script>

        
      </script>
    <script src="../bootstrap-3.3.5-dist/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>



</body>
</html>