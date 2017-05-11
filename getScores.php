<?php
header("Access-Control-Allow-Origin: https://young-hollows-60409.herokuapp.com");
$data = json_decode(file_get_contents("php://input"));
$con =mysqli_connect("helska.cefns.nau.edu","cspeerevolve","Peerevolve1","cspeerevolve") or die(json_encode("fail"));

$sql= "Select EvaluatorID,DateCompleted,GroupID,EvaluateeID,Score FROM EvalResponse where EvalID = '$data[0]' AND CourseID='$data[1]' Order by EvaluatorID";
if($query=mysqli_query($con ,$sql)){
    $array = array();
    $ret=array();
    $i =0;
    $j=0;
    $user = "n";
    $lastuser="n";
    while($row = $query->fetch_row()) {

        $lastuser=$user;
        $user = $row[0];

        if($user!=$lastuser){

            $array[$j++]=$ret;
            //echo $ret[7];
            $temp = $j-1;
            $i=0;
            $ret=array();
            if($array[$temp]==null){
                $j-=1;

            }

        }

        if(strcmp($user,$lastuser)==0){

                //echo $userName;
                array_push($ret,$row[3],$row[4]);

        }

        else {

            $iter = 0;
            $i = 0;
            while ($iter < 5) {
                array_push($ret, $row[$iter]);

                $iter += 1;
            }


        }
    }
    $array[$j]=$ret;
//echo $array[1][7];
    echo json_encode($array);

}
else{
    echo json_encode("no");
}