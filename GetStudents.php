<?php
header("Access-Control-Allow-Origin: https://young-hollows-60409.herokuapp.com");
$data = json_decode(file_get_contents("php://input"));
$con =mysqli_connect("helska.cefns.nau.edu","cspeerevolve","Peerevolve1","cspeerevolve") or die(json_encode("fail"));

$sql="Select `StudentID`, `GroupID`  From Students Where CourseID='$data'";
$i=0;
if($query =mysqli_query($con ,$sql)){
    $array=array();
    while($row = $query->fetch_assoc()){
        $array[$i] =  $row;
        $i=$i+1;

    }
    echo json_encode($array);
}
else{
    echo json_encode("NO");
}
return;
?>