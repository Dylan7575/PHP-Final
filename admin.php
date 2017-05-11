<?php
header("Access-Control-Allow-Origin: https://young-hollows-60409.herokuapp.com");
$data = json_decode(file_get_contents("php://input"));
$con =mysqli_connect("helska.cefns.nau.edu","cspeerevolve","Peerevolve1","cspeerevolve") or die("fail");
$sql = mysqli_query($con ,"SELECT AdminID FROM Administrators WHERE AdminID = '$data' ");
$row =mysqli_fetch_array($sql,2);
echo json_encode($row[0]);
