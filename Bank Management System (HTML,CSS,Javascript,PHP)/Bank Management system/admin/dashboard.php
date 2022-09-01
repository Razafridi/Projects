<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

    <link href="../bootstrap-3.3.5-dist/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php
include '../config.php';

$total_amount = 0;
$total_block = 0;
$total_loan = 0;
$total_user = 0;
$total_loan_amt = 0;
$total_loan_amt_payed = 0;

$res = $conn->query('select count(*) as count from customer');
$row = $res->fetch_assoc();
if($res->num_rows > 0){
$total_user =  $row['count'];
}

$res = $conn->query('select sum(customer_balance) as total from customer');
$row = $res->fetch_assoc();

if($res->num_rows > 0){
    $total_amount =  $row['total'];
    }

$res = $conn->query("select count(*) as count from customer where customer_status = 'Block'");
$row = $res->fetch_assoc();
if($res->num_rows > 0){
    $total_block =  $row['count'];
    }



$res = $conn->query("select count(*) as count from loan");
$row = $res->fetch_assoc();
if($res->num_rows > 0){
    $total_loan =  $row['count'];
    }



$res = $conn->query("select sum(loan_amount) as total from loan where loan_status = 'Approved'");
$row = $res->fetch_assoc();
if($res->num_rows > 0){
    $total_loan_amt =  $row['total'];
    }


$res = $conn->query("select sum(loan_amount) as total from loan where loan_status = 'Payed'");
$row = $res->fetch_assoc();
if($res->num_rows > 0){
    $total_loan_amt_payed =  $row['total'];
    }


    if($total_loan_amt == null){
        $total_loan_amt = 0;
    }
    if($total_loan == null){
        $total_loan = 0;
    }
    if($total_loan_amt_payed == null){
        $total_loan_amt_payed = 0;
    }
    if($total_user == null){
        $total_user = 0;
    }
    if($total_amount == null){
        $total_amount = 0;
    }
    if($total_block == null){
        $total_block = 0;
    }

?>
<body>

     <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="#" class="navbar-brand">Admin</a>

               </div>


               <ul class="nav navbar-nav">
                    <li class="active"><a href="dashboard.php"><span class="glyphicon glyphicon-stats"></span> Dashboard</a></li>
                    <li><a href="index.php"><span class="glyphicon glyphicon-th-large"></span> Add Branch</a></li>
                    <li><a href="showbranches.php"><span class="glyphicon glyphicon-eye-open"></span> Show Branches</a></li>
                    <li><a href="users.php"><span class="glyphicon glyphicon-user"></span> Users</a></li>
                    <li><a href="loan.php"><span class="glyphicon glyphicon-tasks"></span> Loan Request</a></li>
               </ul>
            </div>
        </div>
    </nav>


    <div class="container" style="max-width: 700px;min-width:600px;border-radius: 10px;box-shadow: 2px 3px 3px 3px rgba(0,0,0,0.3);padding: 20px 20px;">
       
                <div class="rows">
                    <div class="cols">
                        <div class="number">
                            <span class="primary-text"><?php echo $total_user; ?></span>
                        </div>
                        <div class="hr"></div>
                        <div class="des">
                            <span>Total Users</span>

                        </div>
                    </div>

                    <div class="cols">
                    <div class="number">
                       <span class="success-text">$<?php echo $total_amount; ?></span>
                    </div>
                    <div class="hr"></div>
                        <div class="des">
                            <span>Total Amount</span>

                        </div>
                    </div>

                    <div class="cols">
                    <div class="number">
                    <span class="danger-text"><?php echo $total_block; ?></span>
                    </div>
                    <div class="hr"></div>
                        <div class="des">
                            <span>Blocked Users</span>

                        </div>
                    </div>
                </div>
                <hr>
                <div class="rows">
                    <div class="cols">
                        <div class="number">
                            <span class="primary-text"><?php echo $total_loan; ?></span>
                        </div>
                        <div class="hr"></div>
                        <div class="des">
                            <span>Total Loan Request</span>

                        </div>
                    </div>

                    <div class="cols">
                    <div class="number">
                       <span class="success-text">$<?php echo $total_loan_amt; ?></span>
                    </div>
                    <div class="hr"></div>
                        <div class="des">
                            <span>Total Loan Taken</span>

                        </div>
                    </div>

                    <div class="cols">
                    <div class="number">
                    <span class="danger-text">$<?php echo $total_loan_amt_payed; ?></span>
                    </div>
                    <div class="hr"></div>
                        <div class="des">
                            <span>Laon Payed</span>

                        </div>
                    </div>
                </div>
                
  
      </div>

      <script>

        
      </script>
    <script src="../bootstrap-3.3.5-dist/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>



</body>
</html>