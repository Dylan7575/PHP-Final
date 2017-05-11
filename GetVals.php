<?php
header("Access-Control-Allow-Origin: https://young-hollows-60409.herokuapp.com");
$data = json_decode(file_get_contents("php://input"));


$con =mysqli_connect("helska.cefns.nau.edu","cspeerevolve","Peerevolve1","cspeerevolve") or die(json_encode("fail"));
/*
$sql= "SELECT EvalID From EvalResponse Where CourseID ='486'";
$j=0;
if($query=mysqli_query($con,$sql)){
    while ($row = $query ->fetch_assoc()){
        $values[$j]=$row['EvalID'];

        $j=$j+1;
    }


}
else{
    echo json_encode("no");
}
*/
$sql= "Select EvalID,OpenDate,DueDate,CloseDate FROM ActiveEvaluations WHERE CourseID = '$data'  ";

if($query=mysqli_query($con ,$sql)){
    $array = array();
    $ret=array();
    $i =0;
    while($row = $query->fetch_assoc()) {
        $sql1 = "Select COUNT( DISTINCT (StudentID)) FROM Students WHERE CourseID = '$data' ";

        $num_students_in_course=0;
        $num_students_responded=0;
        $num_students_not_responded;

        if($query1=mysqli_query($con ,$sql1)){
            $row1=$query1->fetch_row();
            $num_students_in_course =$row1[0];
            //echo json_encode($num_students_in_course);

        }
        else{
            echo json_encode("HECK NO");
        }
        $evalid=$row['EvalID'];
        $sql2 = "SELECT COUNT( DISTINCT (EvaluatorID)) FROM EvalResponse WHERE EvalID = '$evalid' ";

        if($query2=mysqli_query($con ,$sql2)){
            $row2=$query2->fetch_row();
            $num_students_responded =$row2[0];
            //echo json_encode($num_students_responded);

        }
        else{
            echo json_encode("ERROR IN THOUGHT PROCESS");
        }

        $num_students_not_responded = $num_students_in_course - $num_students_responded;

        $array['openDate'] = $row['OpenDate'];
        $array['closedDate'] = $row['CloseDate'];
        $array['dueDate']=$row['DueDate'];
        $array['evalID']=$row['EvalID'];
        $array['studentsResponded']=$num_students_responded;
        $array['studentsNotResponded']=$num_students_not_responded;
        $ret[$i]=$array;
        $i = $i + 1;

    }


        echo json_encode($ret);

}
else{
    echo json_encode("NO");
}

