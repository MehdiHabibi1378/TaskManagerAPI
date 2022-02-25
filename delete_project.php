<?php
require "init.php";

$name = $_GET['name'];
$manager = $_GET['manager'];

$sql  = "select * from project where name ='$name' and manager = '$manager'";
$result  = mysqli_query($con,$sql);

if (mysqli_num_rows($result)>0){
    $sql ="delete from project where name ='$name' and manager = '$manager' ";
    if (mysqli_query($con,$sql)){
        $sql = "select * from task where project_name ='$name' and project_manager = '$manager'";
        $result = mysqli_query($con,$sql);
        if (mysqli_num_rows($result)>0){
            $sql = "delete from task where project_name ='$name' and project_manager = '$manager'";
            if(mysqli_query($con,$sql)){
                echo json_encode(array("status"=>"ok","response"=>"all project and task deleted"));
            }else {
                echo json_encode(array("status" => "failed"));
            }
        }else {
            echo json_encode(array("status" => "ok", "response" => "all project deleted"));
        }
    }else {
        echo json_encode(array("status" => "failed"));
    }
}else {
    echo json_encode(array("status" => "not exist"));
}

mysqli_close($con);
?>