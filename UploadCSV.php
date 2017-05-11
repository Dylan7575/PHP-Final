<?php

header("Access-Control-Allow-Origin: https://young-hollows-60409.herokuapp.com ");
$data = json_decode(file_get_contents("php://input"));

$con =mysqli_connect("helska.cefns.nau.edu","cspeerevolve","Peerevolve1","cspeerevolve") or die(json_encode("fail"));
//$data=["fdas,fdasfds,gadsg,raggleadflj","486"];
//$pieces=explode(",",$data[0]);
//$pieces= ['yes','no','maybe','kinda'];
$i=0;
if (strpos($data[0],",")==true) {
    $pieces=explode(",",$data[0]);
    echo sizeof($pieces);
    while ($i < sizeof($pieces)) {
        $studentID = $pieces[$i++];
        $GroupID = $pieces[$i++];

        //echo $GroupID;
        $sql = "Insert into Groups (GroupID,CourseID) values ('$GroupID','$data[1]')";
        if (mysqli_query($con, $sql)) {
            //echo json_encode( "true");

        } else {
            echo json_encode("false");
        }
        $import = "INSERT into Students(StudentID,CourseID,GroupID) values('$studentID','$data[1]','$GroupID')";
        if (mysqli_query($con, $import)) {
            //echo json_encode( "true");

        } else {
            echo json_encode("false");
        }
        if($pieces[$i]==""){
            break;
        }
    }
}
else{
    $sql = "Insert into Groups (GroupID,CourseID) values ('No Group','$data[1]')";
    if (mysqli_query($con, $sql)) {
        //echo json_encode( "true");

    } else {
        echo json_encode("false");
    }
    $pieces=explode("\n",$data[0]);
    while ($i!= sizeof($pieces)){
        $pieces=explode("\n",$data[0]);
        if ($pieces[$i]===null){
            return;
        }
        $import = "INSERT into Students(StudentID,CourseID,GroupID) values('$pieces[$i]','$data[1]','No Group')";
        if (mysqli_query($con, $import)) {
            echo json_encode( "true");

        } else {
            echo json_encode("false");
        }
        $i++;
        if ($pieces[$i]===""){
            break;
        }
    }
}

