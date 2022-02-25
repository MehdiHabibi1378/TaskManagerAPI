<?php
require "init.php";

$name = $_GET['name'];
$manager = $_GET['manager'];

$sql = "select user_name from project where name='$name' and manager='$manager'";

$result = mysqli_query($con,$sql);

$num = mysqli_num_rows($result);

if ($num>0){
    $arr = array();
    while ($raw = mysqli_fetch_assoc($result)){

        $username = $raw['user_name'];
        array_push($arr,json_encode(array("username"=>$username)));
    }
    echo json_encode(array("status"=>"ok","response"=>$arr));

}else{
    $status = "failed";
    echo json_encode(array("response"=>$status));
}

mysqli_close($con);
?>


