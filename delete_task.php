<?php
require "init.php";
$name = $_GET['name'];
$project_name = $_GET['project_name'];
$project_manager = $_GET['project_manager'];
$sql = "select * from task where name = '$name' and project_name ='$project_name' and project_manager='$project_manager'";
$result = mysqli_query($con,$sql);
if (mysqli_num_rows($result)>0){
    $sql = "delete from task where name = '$name' and project_name ='$project_name' and project_manager='$project_manager'";
    if (mysqli_query($con,$sql)){
        echo json_encode(array("status" => "ok", "response" => "task deleted"));
    }else{
        echo json_encode(array("status" => "failed"));
    }
}else{
    echo json_encode(array("status" => "not exist"));
}
mysqli_close($con);
?>