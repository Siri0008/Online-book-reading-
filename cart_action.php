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
if (isset($_GET["Id"])){
    $Cname=$_SESSION["mail"];
    $Bookname=$_GET["Bookname"];
    $sql="SELECT * FROM `cart_details` WHERE name_cart='$Cname' AND book_cart='$Bookname'";
    $result=$mysqli->query($sql);
    if ($result->num_rows > 0)
    {
        echo "<script>alert('Book Already added');document.location.href=('Cart.php');</script>";
    }
    else
    {
        $sql="INSERT INTO cart_details (name_cart,book_cart) 
        VALUES ('$Cname','$Bookname')";
        if(!mysqli_query($mysqli,$sql))
        {
       echo "<script>alert(' Server Busy! Please try again');document.location.href=('Cart.php');</script>";
        }
         else{  
           echo "<script>alert('Book Added to cart!');document.location.href=('myBooks.php');</script>";   
          
        }
    }
    $mysqli->close();
}?>
