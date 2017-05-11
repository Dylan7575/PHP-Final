<?php
header("Access-Control-Allow-Origin: https://young-hollows-60409.herokuapp.com");
$data = json_decode(file_get_contents("php://input"));

$con =mysqli_connect("helska.cefns.nau.edu","cspeerevolve","Peerevolve1","cspeerevolve") or die(json_encode("fail"));
$sql = "Select CourseID From Students Where StudentID='$data'";
$i=0;
if($query =mysqli_query($con ,$sql)){
    $array=array();
    while($row = $query->fetch_row()){
        $array[$i]=  $row[0];
        $i=$i+1;
    }
    //echo $array[0];

$i=0;

}
else{
    echo json_encode("NO");
}
$sql= "SELECT Distinct(EvalID) From EvalResponse Where EvaluatorID='$data'";
if($query = mysqli_query($con,$sql)){
    $arr=array();
    while($row = $query->fetch_row()){
        $arr[$i]=  $row[0];
        $i=$i+1;
    }
}
else{
    echo json_encode('no');
}
$i=0;
$not = implode(',',$arr);
//echo $not;
$array1=array();
for($j = 0 ;$j<sizeof($array);$j++){
    $array1[$j]=json_encode($array[$j]); 
    //echo $array1[$i];
}

$search = implode(',',$array1);
//echo $not;
//echo $search;
$sql;
if($not==null){
    $sql= "Select CourseID,EvalID,OpenDate,DueDate,CloseDate FROM ActiveEvaluations where CourseID in ($search) and OpenDate<=CURRENT_DATE and CloseDate>=CURRENT_DATE ";
}
else{
    $sql= "Select CourseID,EvalID,OpenDate,DueDate,CloseDate FROM ActiveEvaluations where EvalID NOT IN ($not) and CourseID in ($search) and OpenDate<=CURRENT_DATE and CloseDate>=CURRENT_DATE ";
    
}
if($query =mysqli_query($con ,$sql)){
    $array=array();
    while($row = $query->fetch_assoc()){
        $array[$i]=  $row;
        $i=$i+1;
    }
    echo json_encode($array);
}
else{
   echo "fadsf";
}