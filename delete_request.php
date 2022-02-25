<?php
require "init.php";

$name = $_GET['name'];
$manager = $_GET['manager'];
$user = $_GET['user_name'];

$sql  = "select * from request where name ='$name' and manager = '$manager' and user_name ='$user'";
$result  = mysqli_query($con,$sql);

if (mysqli_num_rows($result)>0){
    $sql ="delete from request where name ='$name' and manager = '$manager' and user_name ='$user' ";
    if (mysqli_query($con,$sql)){
        echo json_encode(array("status" => "ok", "response" => "all project deleted"));

    }else {
        echo json_encode(array("status" => "failed"));
    }
}else {
    echo json_encode(array("status" => "not exist"));
}

mysqli_close($con);
?>