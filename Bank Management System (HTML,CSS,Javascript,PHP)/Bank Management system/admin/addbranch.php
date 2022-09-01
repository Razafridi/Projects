<?php

include '../config.php';

$city = $_POST['city'];
$date = $_POST['date'];
$address = $_POST['address'];
$number = $_POST['number'];
$province = $_POST['province'];

if(!empty($city) && !empty($date) && !empty($address) && !empty($number) &&  !empty($province) ){

    $check_branch = $conn->query("select * from branch where branch_no =".$number." ");
    $res = $check_branch->fetch_assoc();
    if($check_branch->num_rows > 0){
        header('location: index.php?error=Branch Already Exist!');
    }else{


$sql = "insert into branch values ('".$number."','".$city."','".$address."','".$province."','".$date."')";
if($conn->query($sql)){
    
    header('location: index.php');
    echo 'add branch Successfully';
}else{
    echo 'Something went wrong!';
}
    }
}else{
    header('location: index.php?error=Some Fields are Empty');
}
?>

?>