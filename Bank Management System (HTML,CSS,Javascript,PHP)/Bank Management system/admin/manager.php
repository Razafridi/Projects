<?php

include "config.php";
echo "<a href='index.php'>failed to insert. Go back</a>";
$m_name = $_GET['m_name'];
$m_id = $_GET['m_id'];
$m_dob = $_GET['m_dob'];
$m_qualification = $_GET['m_qualification'];
$m_experience = $_GET['m_experience'];
$m_address = $_GET['m_address']; 
$m_phone = $_GET['m_phone'];
$m_city = $_GET['m_city'];
$branch_no = $_GET['branch_no'];


$s_date = date('y-m-d');
$e_date = '0000-00-00';
$status = "Active";

print_r($_GET);



$sql = "insert into manager  values ('".$m_id."','".$m_name."','".$m_dob."','".$m_qualification."','".$m_experience."','".$m_address."','".$m_phone."','".$m_city."','".$branch_no."','".$s_date."','".$e_date."','".$status."')";


if($conn->query($sql)){
    header("location: index.php");
}else{
    
}


?>