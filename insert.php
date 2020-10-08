<?php
$user_name = $_POST['user_name'];
$mob = $_POST['mob'];
$user_email = $_POST['user_email'];
$user_year = $_POST['user_year'];
$user_bio = $_POST['user_bio'];
$user_mevent = $_POST['user_mevent'];
$user_event = $_POST['user_event'];
$user_experience = $_POST['user_experience'];
if (!empty($user_name) || !empty($mob) || !empty($user_email) || !empty($user_year) || !empty($user_bio) || !empty($user_mevent) || !empty($user_event) || !empty($user_experience)) {
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "nmimsreg_db";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT user_email From registration Where user_email = ? Limit 5";
     $INSERT = "INSERT Into registration (user_name, mob, user_email, user_year, user_bio, user_mevent, user_event, user_experience) values(?, ?, ?, ?, ?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $user_email);
     $stmt->execute();
     $stmt->bind_result($user_email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum>-1) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sissssss",$user_name, $mob, $user_email, $user_year, $user_bio, $user_mevent, $user_event, $user_experience);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>
