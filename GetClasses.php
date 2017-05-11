<?php
header("Access-Control-Allow-Origin: https://young-hollows-60409.herokuapp.com");
$data = json_decode(file_get_contents("php://input"));
$con =mysqli_connect("helska.cefns.nau.edu","cspeerevolve","Peerevolve1","cspeerevolve") or die(json_encode("fail"));


$sql= "SELECT CourseID,Semester From Course Where AdminID = '$data' ";
$i=0;
$ret=array();
if($query =mysqli_query($con ,$sql)){
    while($row = $query->fetch_assoc()){
        $array["CourseID"] =  $row['CourseID'];
        $array["Semester"] = $row['Semester'];
       // echo json_encode($array);
        $ret[$i]=$array;
        $i=$i+1;

    }
    echo json_encode($ret);



}
else{
    echo json_encode("NO");
}