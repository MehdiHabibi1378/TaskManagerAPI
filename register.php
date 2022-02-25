<?php

require "init.php";

$name = $_GET["name"];
$email = $_GET["email"];
$user_name = $_GET["user_name"];
$user_password = $_GET["user_password"];

$sql = "select * from login_info where user_name = '$user_name'";

$result = mysqli_query($con,$sql);

if (mysqli_num_rows($result)>0){
    $status = "exist";
}else{
    $sql = "insert into login_info(name,email,user_name,user_password) values ('$name','$email','$user_name','$user_password')";
    if (mysqli_query($con,$sql)){
        $status="ok";
    }else{
        $status = "error";
    }
}

echo json_encode(array("response"=>$status));
mysqli_close($con);

?>