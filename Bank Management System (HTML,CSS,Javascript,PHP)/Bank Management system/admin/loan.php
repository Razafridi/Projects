<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="../bootstrap-3.3.5-dist/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">


<?php

include '../config.php';

$result = $conn->query('select * from loan order by loan_id desc');
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
                    <li><a href="index.php"><span class="glyphicon glyphicon-th-large"></span> Add Branch</a></li>
                    <li><a href="showbranches.php"><span class="glyphicon glyphicon-eye-open"></span> Show Branches</a></li>
                    <li><a href="users.php"><span class="glyphicon glyphicon-user"></span> Users</a></li>
                    <li  class="active"><a href="loan.php"><span class="glyphicon glyphicon-tasks"></span> Loan Request</a></li>
               </ul>
            </div>
        </div>
    </nav>


    <div class="container" style="max-width: 800px;min-width:400px;border-radius: 10px;box-shadow: 2px 3px 3px 3px rgba(0,0,0,0.3);padding: 20px 20px;">
        
            
    <div class="table-responsive">
        <table class="table table-striped table-dark">
            <tr class="primary">
                <th>Loan Serial</th>
                <th>Account Number</th>
                <th>Name</th>
                <th>Loan Amount</th>
                <th>Date</th>
                <th>Status</th>
                <th>Accept</th>
                <th>Reject</th>
                
            </tr>

            <?php
                while($row = $result->fetch_assoc()){
                    $nameres = $conn->query("select customer_name from customer where customer_account = ".$row['customer_account']."");
                    $name = $nameres->fetch_assoc();
            ?>
            <tr>
                <td><?php echo $row['loan_id'] ?></td>
                <td><?php echo $row['customer_account'] ?></td>
                <td><?php echo $name['customer_name']; ?></td>
                <td><?php echo $row['loan_amount'] ?></td>
                <td><?php echo $row['loan_date'] ?></td>
                <td><?php echo $row['loan_status'] ?></td>
                <td><?php  if($row['loan_status'] == 'Pending'){
                    echo "<button onclick='accept(".$row['loan_id'].",".$row['customer_account'].",".$row['loan_amount'].")' class='btn btn-success'>Acccept</button>";
                }elseif($row['loan_status'] == 'Cancel'){
                    echo "<span style='color:#ff2000;'>User Cancel</span>";
                }elseif($row['loan_status'] == 'Approved'){
                    echo "<span style='color:#0088ff;'>Loan Request Accept</span>";
                }elseif($row['loan_status'] == 'Reject'){
                    echo "<span style='color:#ff2000;'>Loan Rejected</span>";
                }elseif($row['loan_status'] == 'Payed'){
                    echo "<span style='color:#22ff00;'>Loan Payed</span>";
                }
                 ?></td>
                <td><?php  if($row['loan_status'] == 'Pending'){
                    echo "<button onclick='reject(".$row['loan_id'].")' class='btn btn-danger'>Reject</button>";
                }elseif($row['loan_status'] == 'Cancel'){
                    echo "<span style='color:#ff2000;'>Canceled</span>";
                }elseif($row['loan_status'] == 'Approved'){
                    echo "<span style='color:#0088ff;'>Accepted</span>";
                }elseif($row['loan_status'] == 'Reject'){
                    echo "<span style='color:#ff2000;'>Loan Rejected</span>";
                }elseif($row['loan_status'] == 'Payed'){
                    echo "<span style='color:#22ff00;'>Loan Payed</span>";
                }
                 ?></td>
                
            </tr>

            <?php } ?>
        </table>
    </div>
        </div>


    <script src="../bootstrap-3.3.5-dist/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
<script>
    function reject(id){
        
        var xml = new XMLHttpRequest();
        xml.onreadystatechange = function(){
            setTimeout(function(){
                window.location.href= 'loan.php';
            },100);
            
        }
        xml.open('get','../modifiedloan.php?state=Reject&loanid='+id,true);
        xml.send();
    }

    function accept(id,uid,amt){
        
        var xml = new XMLHttpRequest();
        xml.onreadystatechange = function(){
            setTimeout(function(){
                window.location.href= 'loan.php';
            },100);
            
        }
        xml.open('get','../modifiedloan.php?state=Accept&loanid='+id+'&uid='+uid+'&amt='+amt,true);
        xml.send();
    }
</script>
</body>
</html>