<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">


    <?php
        
        include "config.php";
        $sql = "select * from manager";
        $res = $conn->query($sql);
        if(empty($_GET['manager_id']))
        $_GET['manager_id'] = '';

       


    ?>
</head>
<body>
    <a style="text-decoration: none; font-weight: bold;" href="index.php">Add More >> </a>
    <div class="container">
        <div class="list">
        <ul>
            <?php

            while($row = $res->fetch_assoc()){
            
                    ?>
            <li><a href="?manager_id=<?php echo $row['mgr_id'] ?>"><?php echo $row['mgr_id']; ?></a></li>
            <?php } ?>
        </ul>
    </div> 


    <div style="font-family: 'Courier New', Courier, monospace;" class="list">

    <?php

        $res = $conn->query("select * from manager where mgr_id = '".$_GET['manager_id']."'");
            
        
        $row = $res->fetch_assoc();
        if($row->num_rows != NULL){

?>
        <label>Name : <?php echo $row['mgr_name'];  ?></label><br>
        <label>Date of Birth : <?php echo $row['mgr_dob'];  ?></label><br>
        <label>Qualification : <?php echo $row['mgr_qualification'];  ?></label><br>
        <label>Experience : <?php echo $row['mgr_experience'];  ?></label><br>
        <label>Address : <?php echo $row['mgr_address'];  ?></label><br>
        <label>Phone : <?php echo $row['mgr_phone'];  ?></label><br>
        <label>City : <?php echo $row['mgr_city'];  ?></label><br>
        <label>Brach NO : <?php echo $row['branch_no'];  ?></label><br>
        <label>First Day : <?php echo $row['mgr_start_date'];  ?></label><br>
        <label>Status : <?php echo $row['mgr_status'];  ?></label><br>
        <label><a href="?delete_key=<?php echo $_GET['manager_id']; ?>">Delete</a></label>
        <?php
        }else{
        ?>
        <label>Empty Set</label>
        <?php
        }
        ?>
    </div>
    </div>


    <?php
    if(!empty($_GET['delete_key'])){
        $sql= "delete from manager where mgr_id = '".$_GET['delete_key']."'";
        $conn->query($sql);
        $_GET['delete_key'] ='';
        header("location: lists.php?manager_id=".$_GET['manager_id']);


    }
    ?>
    
</body>
</html>