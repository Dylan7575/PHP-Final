<?php
header("Access-Control-Allow-Origin: https://young-hollows-60409.herokuapp.com");
//$data = json_decode(file_get_contents("php://input"));
$con =mysqli_connect("helska.cefns.nau.edu","cspeerevolve","Peerevolve1","cspeerevolve") or die(json_encode("fail"));
$sql = "Select Groups from Students WHERE CourseID ='486' and StudentID='dcl75'";
$i=0;
if($query =mysqli_query($con ,$sql)){
    while($row = $query->fetch_assoc()){
        $array[$i] =  $row;
        $i=$i+1;

    }
    //echo json_encode($array);
}
else{
    echo json_encode("NO");
}
$sql = "Select StudentID From Students Where Groups = 'PeerEvolve' and CourseID = '486'";
$i=0;
if($query =mysqli_query($con ,$sql)){
    while($row = $query->fetch_assoc()){
        $array[$i] =  $row;
        $i=$i+1;

    }
    echo json_encode($array);
}
else{
    echo json_encode("NO");
}