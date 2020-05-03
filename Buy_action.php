<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: LoginU.php");
    exit;
}

ob_start();
require "Db.php";
if (isset($_POST['payment'])){
    $Bookname=$_SESSION["Bookname"];
    $Cname=$_SESSION["mail"];
    $sql="SELECT * FROM `purchase_details` WHERE Cname='$Cname' AND BookP='$Bookname'";
    $result=$mysqli->query($sql);
    if ($result->num_rows > 0)
    {
        echo "<script>alert('Book Already Purchased');document.location.href=('Buy.php');</script>";
    }
    else
    {
        $sql="INSERT INTO purchase_details (Cname,BookP) 
        VALUES ('$Cname','$Bookname')";
        if(!mysqli_query($mysqli,$sql))
        {
            echo "<script>alert(' Server Busy! Please try again');document.location.href=('Buy.php');</script>";
        }
        else{
            echo "<script>alert('Book Added');document.location.href=('myBooks.php');</script>";
        }
    }
    $conn="UPDATE `users` 
    SET $Bookname='1' WHERE mail='$Cname'";
    if(!mysqli_query($mysqli,$conn))
    {
   echo "<script>alert(' Server Busy! Please try again');document.location.href=('Buy.php');</script>";
    }
     else{  
       echo "<script>alert('Book Added');document.location.href=('myBooks.php');</script>";   
      
    }
    $mysqli->close();
}?>