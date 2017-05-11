<?php
header("Access-Control-Allow-Origin:https://young-hollows-60409.herokuapp.com");
$data = json_decode(file_get_contents("php://input"));
$con =mysqli_connect("helska.cefns.nau.edu","cspeerevolve","Peerevolve1","cspeerevolve") or die(json_encode("fail"));
$row;
$sql= "Select GroupID From Students Where StudentID=$data[0] AND CourseID='$data[1]'";
if($query=mysqli_query($con,$sql)){
    $row=$query->fetch_assoc();
    echo json_encode($row["GroupID"]);
}