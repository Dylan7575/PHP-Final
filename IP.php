<?php
header("Access-Control-Allow-Origin: https://young-hollows-60409.herokuapp.com");
$data = json_decode(file_get_contents("php://input"));

$CD=$data[0];
$DD=$data[1];
$OD=$data[2];

$f=rand(0,10000);

$con =mysqli_connect("helska.cefns.nau.edu","cspeerevolve","Peerevolve1","cspeerevolve") or die(json_encode("fail"));


$sql= "INSERT INTO ActiveEvaluations (EvalID,QuestionID,OpenDate,DueDate,CloseDate,AdminID,CourseID) VALUES('$f',2,'$data[0]','$data[1]','$data[2]','$data[3]','$data[4]')";

if(mysqli_query($con ,$sql)){
    echo json_encode( "yea");
}
else{
    echo json_encode("NO");
}
//echo json_encode("no");
