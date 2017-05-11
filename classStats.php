<?php
header("Access-Control-Allow-Origin: https://young-hollows-60409.herokuapp.com");
$data = json_decode(file_get_contents("php://input"));
$con =mysqli_connect("helska.cefns.nau.edu","cspeerevolve","Peerevolve1","cspeerevolve") or die("fail");
$sql = "Select CourseID From ActiveEvaluations Where CloseDate<CURRENT_DATE";
if($query =mysqli_query($con,$sql)){
    while($row = $query->fetch_assoc()) {
        $ret[$i]=$row;
        $i = $i + 1;

    }
    json_encode($ret);

}
else {
    echo json_encode("no");
}