<?php
require "init.php";

$name = $_GET['name'];
$manager = $_GET['manager'];
$user = $_GET['user_name'];

$sql  = "select * from project where name ='$name' and manager = '$manager' and user_name = '$user'";
$result  = mysqli_query($con,$sql);
if (mysqli_num_rows($result)>0){
    $sql = "delete from project where name ='$name' and manager = '$manager' and user_name = '$user' ";
    if (mysqli_query($con,$sql)){
        echo json_encode(array("response"=>"ok"));
    }else{
        echo json_encode(array("response"=>"failed"));
    }
}else{
    echo json_encode(array("response"=>"user not found"));
}

mysqli_close($con);
?>