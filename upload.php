
<?php

header("Access-Control-Allow-Origin: https://young-hollows-60409.herokuapp.com");

$data = json_decode(file_get_contents("php://input"));
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(array('status' => false));
    exit;
}
if(!isset($_POST['class'])){
    echo json_encode(
        array('status' => false, 'msg' => 'No file ufadsploaded.')
    );
    exit;
}

$class=$_POST['class'];
$path = 'uploads/';

if (isset($_FILES['file'])) {
    $originalName = $_FILES['file']['name'];
    $ext = '.'.pathinfo($originalName, PATHINFO_EXTENSION);
    $generatedName = md5($_FILES['file']['tmp_name']).$ext;
    $filePath = $path.$generatedName;

    if (!is_writable($path)) {
        echo json_encode(array(
            'status' => false,
            'msg'    => 'Destination directory not writable.'
        ));
        exit;
    }

    if (move_uploaded_file($_FILES['file']['tmp_name'], $filePath)) {

    }
}
else {
    echo json_encode(
        array('status' => false, 'msg' => 'No file uploaded.')
    );
    exit;
}
/*


$path='uploads/'. $generatedName;
$file=fopen($path,'r');


$con =mysqli_connect("helska.cefns.nau.edu","cspeerevolve","Peerevolve1","cspeerevolve") or die(json_encode("fail"));
   while( ($handle=fgetcsv($file,1000,","))!= false){
       if($handle[0]==null && $handle[1]==null && $handle[2]==null){
           break;
       }
       $import="INSERT into Students(StudentID,CourseID,GroupID) values('$handle[0]','$class','$handle[1]')";
       if(mysqli_query($con ,$import)){
           echo json_encode( "true");
           //echo $handle[0];
       }
       else{
           //echo json_encode($handle);
        }
}
echo json_encode("true");
unlink($file);


?>