<?php
require "init.php";

$name = $_GET['name'];
$project_name = $_GET['project_name'];
$project_manager = $_GET['project_manager'];
$creat_date = $_GET['create_date'];
$status = 0;
$sql = "select * from task where name ='$name' and project_name = '$project_name' and project_manager = '$project_manager'";

$result = mysqli_query($con,$sql);
if (mysqli_num_rows($result)>0){
    $st = "exist";
}else{
    $sql = "insert into task (name,project_name,project_manager,create_date,status)
    values ('$name','$project_name','$project_manager','$creat_date','$status') ";
    if (mysqli_query($con,$sql)){
        $st="ok";
    }else{
        $st = "error";
    }
}

echo json_encode(array("response"=>$st));
mysqli_close($con);

?>