<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="../bootstrap-3.3.5-dist/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">


<?php

include '../config.php';

$result = $conn->query('select * from branch');
?>

</head>
<body>

     <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="#" class="navbar-brand">Admin</a>

               </div>


               <ul class="nav navbar-nav">
               <li><a href="dashboard.php"><span class="glyphicon glyphicon-stats"></span> Dashboard</a></li>
                    <li ><a href="index.php"><span class="glyphicon glyphicon-th-large"></span> Add Branch</a></li>
                    <li class="active"><a href="showbranches.php"><span class="glyphicon glyphicon-eye-open"></span> Show Branches</a></li>
                    <li><a href="users.php"><span class="glyphicon glyphicon-user"></span> Users</a></li>
                    <li><a href="loan.php"><span class="glyphicon glyphicon-tasks"></span> Loan Request</a></li>
               </ul>
            </div>
        </div>
    </nav>


    <div class="container" style="max-width: 800px;min-width:400px;border-radius: 10px;box-shadow: 2px 3px 3px 3px rgba(0,0,0,0.3);padding: 20px 20px;">
        
            
    <div class="table-responsive">
        <table class="table table-striped table-dark">
            <tr class="primary">
                <th>Branch Number</th>
                <th>Branch City</th>
                <th>Branch Address</th>
                <th>Branch Province</th>
                <th>Branch First Day</th>
                
            </tr>

            <?php
                while($row = $result->fetch_assoc()){
            ?>
            <tr>
                <td><?php echo $row['branch_no'] ?></td>
                <td><?php echo $row['branch_city'] ?></td>
                <td><?php echo $row['branch_address'] ?></td>
                <td><?php echo $row['branch_province'] ?></td>
                <td><?php echo $row['branch_open_date'] ?></td>
                
            </tr>

            <?php } ?>
        </table>
    </div>
        </div>


    <script src="../bootstrap-3.3.5-dist/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>



</body>
</html>