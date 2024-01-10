<?php

header('Content-Type: application/json');
header('Acess-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

$data = json_decode(file_get_contents("php://input"),true); // this format will read all the formats(json etc)
$name = $data['sname'];
$age = $data['sage'];
$scity = $data['scity'];
include "config.php";


$sql = "INSERT INTO `student`(`name`, `age`, `city`) VALUES ('$name','$age','$scity')";

if(mysqli_query($conn,$sql)){
    echo  json_encode(array('message'=>'Student Record Inserted','status'=>true));
}
else{
    echo  json_encode(array('message'=>'Insertion Failed Try Again!','status'=>false));
}

?>