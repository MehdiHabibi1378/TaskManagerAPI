<?php
require "init.php";

$name = $_GET['name'];
$project_name = $_GET['project_name'];
$project_manager = $_GET['project_manager'];
$status = $_GET['status'];

$sql = "update task set status = '$status' where name = '$name' and project_name ='$project_name' and project_manager = '$project_manager'";

if (mysqli_query($con,$sql)){
    echo json_encode(array("response"=>"ok"));
}else{
    echo json_encode(array("response"=>"failed"));
}

mysqli_close($con);
?>