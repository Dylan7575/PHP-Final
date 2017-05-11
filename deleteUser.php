<?php
header("Access-Control-Allow-Origin: https://young-hollows-60409.herokuapp.com");
$data = json_decode(file_get_contents("php://input"));
$con =mysqli_connect("helska.cefns.nau.edu","cspeerevolve","Peerevolve1","cspeerevolve") or die("fail");
$sql = "Delete From Students WHERE StudentID = '$data[0]'and Groups='$data[1]' and CourseID='$data[2]'";
mysqli_query($con,$sql);
echo json_encode("great success");