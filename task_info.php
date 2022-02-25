<?php
require "init.php";

$name = $_GET['name'];
$project_name = $_GET['project_name'];
$project_manager = $_GET['project_manager'];
$sql = "select * from task where name ='$name' and project_name = '$project_name' and project_manager = '$project_manager'";

$result = mysqli_query($con,$sql);

if(!mysqli_num_rows($result)>0){
    $status = "failed";
    echo json_encode(array("response"=>$status));
}else{
    $row = mysqli_fetch_assoc($result);
    $doby = $row['do_by'];
    $create_date = $row['create_date'];
    $time = $row["time"];
    $st = $row["status"];
    $status = "ok";
    echo json_encode(array("response"=>$status,"do_by"=>$doby
    ,"date"=>$create_date,"time"=>$time,"status"=>$st));
}

mysqli_close($con);

?>