<?php
header("Access-Control-Allow-Origin: https://young-hollows-60409.herokuapp.com");
$data = json_decode(file_get_contents("php://input"));
$con =mysqli_connect("helska.cefns.nau.edu","cspeerevolve","Peerevolve1","cspeerevolve") or die(json_encode("fail"));
$sql="Insert Into Groups(CourseID,GroupID) Values('$data[1]','$data[0]')";
if(mysqli_query($con ,$sql)){

    //echo json_encode( "yea");
}
else {
    echo json_encode("NO");
}