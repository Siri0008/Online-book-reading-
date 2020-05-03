<?php
 session_start();
ob_start();
require "Db.php";
if (isset($_POST['submit'])){
    $feedback=$_POST['feedback'];
    $name=$_SESSION["name"];
    $mail=$_SESSION["mail"];
    $sql = "INSERT INTO `feedbacks` (Fmail,feedback) VALUES ('$mail', '$feedback')";
    if(!mysqli_query($mysqli,$sql))
       {
          echo "<script>alert('Server Busy>Please Try again');document.location.href=('Feedback.php');</script>";
       }

       else
       {
          echo "<script>alert('feedback added successfully');document.location.href=('feedback.php');</script>";    
       }

}