<?php

$name = $_POST['name'];
$Email = $_POST['Email'];
$LinkCompt = $_POST['LinkCompt'];
$Credit = $_POST['Credit'];
$Belongs = $_POST['Belongs'];
$Message = $_POST['Message'];


if (!empty($name) || !empty($Email) || !empty($LinkCompt)  || !empty($Credit) || !empty($Belongs)|| !empty($Message)){
  	$host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "Creator's Club";
    // connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT Email From video_form Where Email = ? Limit 1";
     $INSERT = "INSERT Into video_form (name,Email,LinkCompt,Credit,Belongs,Message) values(?,?,?,?,?,?)";
     // statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $Email);
     $stmt->execute();
     $stmt->bind_result($Email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssss" , $name, $Email, $LinkCompt , $Credit,$Belongs,$Message);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already video_form using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>