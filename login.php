<?php
header("Access-Control-Allow-Origin: https://young-hollows-60409.herokuapp.com");
require_once "cas.php";
session_start();

global $user, $auth;
$user =$_SESSION['name'];
$con =mysqli_connect("helska.cefns.nau.edu","cspeerevolve","Peerevolve1","cspeerevolve") or die(json_encode("fail"));


$sql= "Select AdminID from Administrators where AdminID= '$user' ";
if($query=mysqli_query($con ,$sql)){

   $row=$query->fetch_row();
   if ($row!=null){
       $_SESSION['auth']="admin";
   }
   else{
       $_SESSION['auth']="student";
   }
}
else{
    echo json_encode("NO");
}
$auth =$_SESSION['auth'];
session_name($_SESSION['name']);


header("location: https://young-hollows-60409.herokuapp.com/");

?>
