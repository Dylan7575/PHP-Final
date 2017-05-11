<?php
header("Access-Control-Allow-Origin: https://young-hollows-60409.herokuapp.com");
$data = json_decode(file_get_contents("php://input"));

$con =mysqli_connect("helska.cefns.nau.edu","cspeerevolve","Peerevolve1","cspeerevolve") or die(json_encode("fail"));

$sql= "Select Distinct EvaluateeID,GroupID FROM EvalResponse where EvalID = '$data[0]' AND CourseID='$data[1]'";
if($query=mysqli_query($con ,$sql)){
    $ret=array();
    $array=array();
    $average;
    $i =0;
    while($row = $query->fetch_assoc()) {
        $array=array();
        $tor = $row['EvaluateeID'];
        $sql= "SELECT AVG( Score ) FROM EvalResponse WHERE EvaluateeID = '$tor' and EvalID = '$data[0]'";
        if($query2=mysqli_query($con ,$sql)) {

                $average=$query2->fetch_row();

                //$array=json_decode($array);
                //echo json_encode($array);


        }
        $array["User"]= $row['EvaluateeID'];
        $array["GroupName"]=$row['GroupID'];
        $array["Average"]=$average;
        $ret[$i]=$array;
        $i = $i + 1;


    }


    echo json_encode($ret);

}
else{
    echo "no";
}