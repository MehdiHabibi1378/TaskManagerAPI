<?php
require "init.php";

$project_name = $_GET["project_name"];
$manager = $_GET["project_manager"];

$sql = "select * from task where project_name = '$project_name' and project_manager = '$manager'";

$result = mysqli_query($con,$sql);

$num = mysqli_num_rows($result);

if ($num>0){
    $arr = array();
    while ($raw = mysqli_fetch_assoc($result)){

        $name = $raw['name'];
        $do_by = $raw['do_by'];
        $create = $raw['create_date'];
        $time = $raw['time'];
        $st = $raw['status'];
        array_push($arr,json_encode(array("name"=>$name,"do_by"=>$do_by,"create_time"=>$create,"time"=>$time
        ,"status"=>$st)));
    }
    echo json_encode(array("status"=>"ok","response"=>$arr));

}else{
    $status = "failed";
    echo json_encode(array("response"=>$status));
}

mysqli_close($con);
?>