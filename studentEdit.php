<?php
header("Access-Control-Allow-Origin: https://young-hollows-60409.herokuapp.com");
$data = json_decode(file_get_contents("php://input"));
$con =mysqli_connect("helska.cefns.nau.edu","cspeerevolve","Peerevolve1","cspeerevolve") or die("fail");
$sql = "UPDATE Students SET StudentID = '$data[0]',GroupID='$data[1]' Where StudentID='$data[2]' and GroupID ='$data[3]' and CourseID='$data[4]'";
mysqli_query($con,$sql);
echo json_encode("great success");