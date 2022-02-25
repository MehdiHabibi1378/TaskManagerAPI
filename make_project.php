<?php
require "init.php";

$name = $_GET['name'];
$manager = $_GET['manager'];
$username= $_GET['user_name'];

$sql  = "select * from project where name ='$name' and manager = '$manager' and user_name ='$username'";
$sql_user = "select * from login_info where user_name = '$username'";

$user_result = mysqli_query($con,$sql_user);
if (mysqli_num_rows($user_result)>0) {
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $status = "exist";
    } else {
        $sql = "insert into project(name,manager,user_name) values ('$name','$manager','$username')";
        if (mysqli_query($con, $sql)) {
            $status = "ok";
        } else {
            $status = "error";
        }
    }
}else{
    $status = "user_not_found";
}

echo json_encode(array("response"=>$status));
mysqli_close($con);

?>