<?php

$name = $_POST['name'];
$Email = $_POST['Email'];
$Link = $_POST['Link'];
$Credit = $_POST['Credit'];
$Type = $_POST['Type'];
$Class = $_POST['Class'];
$accept = $_POST['accept'];
$details = $_POST['details'];
$acceptCond = $_POST['acceptCond'];


if (!empty($name) || !empty($Email) || !empty($Link)  || !empty($Credit) || !empty($Type)|| !empty($Class) || !empty($accept) || !empty($details)|| !empty($acceptCond)){
  	$host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "Creator's Club";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     //$SELECT = "SELECT Email From imageuploadform Where Email = '$Email'";
     $INSERT = "INSERT Into imageuploadform (name,Email,Link,Credit,Type,Class,accept,details,acceptCond) values(?,?,?,?,?,?,?,?,?)";
     //Prepare statement
    // $stmt = $conn->prepare($SELECT);
     //$stmt->bind_param("s", $Email);
     //$stmt->execute();
     //$stmt->bind_result($Email);
    // $stmt->store_result();
    // $rnum = $stmt->num_rows;
    // if ($rnum==0) {
     // $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssssssss" , $name, $Email, $Link , $Credit,$Type,$Class, $accept,$details,$acceptCond);
      $stmt->execute();
      echo "New record inserted sucessfully";
     //} //else {
     // echo "Someone already uploaded using this email";
    // }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}

/*$query = "SELECT * FROM `table_name` WHERE `submission_id` = '$submission_id'";
$sqlsearch = mysql_query($query);
$resultcount = mysql_numrows($sqlsearch);

if ($resultcount > 0) {
 
    mysql_query("UPDATE `table_name` SET
                                `name` = '$name',
                                `email` = '$email',
                                `phone` = '$phonenumber',
                                `subject` = '$subject',
                                `message` = '$message'       
                             WHERE `submission_id` = '$submission_id'")
     or die(mysql_error());
   
} else {

    mysql_query("INSERT INTO `table_name` (submission_id, formID, IP,
                                                                          name, email, phone, subject, message)
                               VALUES ('$submission_id', '$formID', '$ip',
                                                 '$name', '$email', '$phonenumber', '$subject', '$message') ")
    or die( mysql_error()); 

}*/
?>

