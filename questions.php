<?php
header("Access-Control-Allow-Origin: https://young-hollows-60409.herokuapp.com");
$data = json_decode(file_get_contents("php://input"));

$con =mysqli_connect("helska.cefns.nau.edu","cspeerevolve","Peerevolve1","cspeerevolve") or die(json_encode("fail"));
$sql ="Select QuestionID From ActiveEvaluations Where EvalID = 1 ";
if($query=mysqli_query($con ,$sql)){
    $array = array();
    $ret=array();
    $i =0;
    while($row = $query->fetch_row()) {
        $array[$i] = $row[0];
        $i = $i + 1;

    }


   // echo $array[0];

}
else{
    echo json_encode("NO");
}
$sql= "Select Question1,Question2,Question3 From EvalTemplates Where EvalTemplateID = '$array[0]'";
if($query=mysqli_query($con ,$sql)){
    $array = array();
    $ret=array();
    $i =0;
    while($row = $query->fetch_assoc()) {
        $array[$i] = $row;
        $i = $i + 1;

    }


    echo json_encode($array);

}
else{
    echo json_encode("NO");
}