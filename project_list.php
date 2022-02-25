<?php
require "init.php";

$username = $_GET["user_name"];

$sql = "select * from project where user_name = '$username'";

$result = mysqli_query($con,$sql);

$num = mysqli_num_rows($result);

if ($num>0){
    $arr = array();
     while ($raw = mysqli_fetch_assoc($result)){

       $name = $raw['name'];
       $manager = $raw['manager'];
       array_push($arr,json_encode(array("name"=>$name,"manager"=>$manager)));
 }
 echo json_encode(array("status"=>"ok","response"=>$arr));

}else{
    $status = "failed";
    echo json_encode(array("response"=>$status));
}

mysqli_close($con);
?>
