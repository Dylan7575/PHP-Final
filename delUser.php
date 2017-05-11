<?php
header("Access-Control-Allow-Origin: https://young-hollows-60409.herokuapp.com");
$data = json_decode(file_get_contents("php://input"));
$con =mysqli_connect("localhost","root","","test") or die("fail");
$sql = "UPDATE Students SET StudentID = '$data[0]',Groups='$data[1]' Where StudentID='$data[2]' and Groups ='$data[3]' and CourseID='$data[4]'";
mysqli_query($con,$sql);
echo json_encode("great success");