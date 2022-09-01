<?php
include '../config.php';
if($_GET['state'] === 'Active'){
    $sql = "update customer set customer_status ='Block' where customer_account = ".$_GET['uid']." ";
    $conn->query($sql);
    }else{
    $sql = "update customer set customer_status ='Active' where customer_account = ".$_GET['uid']." ";
    $conn->query($sql);
    
    }
?>