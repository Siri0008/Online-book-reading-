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
if (isset($_POST['cancel'])){
    $Id=$_SESSION["ID"];
    $Bookname=$_SESSION["Bookname"];
    $Cname=$_SESSION["mail"];
    $sql="SELECT * FROM `cart_details` WHERE name_cart='$Cname' AND book_cart='$Bookname'";
    $result=$mysqli->query($sql);
    if ($result->num_rows == 0)
    {
        echo "<script>alert('Book Already deleted');document.location.href=('myBooks.php');</script>";
    }
    else
    {
        $sql="DELETE FROM `cart_details` 
        WHERE name_cart='$Cname' AND book_cart='$Bookname'";
        if(!mysqli_query($mysqli,$sql))
        {
       echo "<script>alert(' Server Busy! Please try again');document.location.href=('myBooks.php');</script>";
        }
         else{  
           echo "<script>alert('Book deleted sucessfully!');document.location.href=('myBooks.php');</script>";   
          
        }
    }
    $mysqli->close();
}?>