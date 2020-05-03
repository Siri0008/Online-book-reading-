
<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: LoginA.php");
    exit;
}

ob_start();
require "Db.php";
if (isset($_POST['submit'])){
    
        $Bookname=$_POST['Bookname'];
        $Author=$_POST['Author'];
        $Genre=$_POST['Genre'];
            $sql="SELECT Id FROM books WHERE Bookname='$Bookname'AND Author='$Author'";
            $result=$mysqli->query($sql);
            if($row=$result->fetch_assoc()>0){
				 $sql = "DELETE FROM books WHERE Bookname='$Bookname'AND Author='$Author'";
                 if(!mysqli_query($mysqli,$sql))
				{
               echo "<script>alert(' Server Busy! Please try again');document.location.href=('RemoveBook.php');</script>";
				}
				else
				{
                    $sql="SELECT * FROM books";
               $result=$mysqli->query($sql);?><?php
               echo "<script>alert('Book Deleted');document.location.href=('RemoveBook.php');</script>";   
              
           }
        }
            else{
                echo "<script>alert('Book Not found to be deleted!');document.location.href=('RemoveBook.php');</script>";
            }
}
  

?>
