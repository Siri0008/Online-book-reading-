
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
        $cost=$_POST['cost'];
        $description=$_POST['description'];
        $filename=$_FILES['file']['name'];
        $directory = getcwd().'/file/';
        $file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
        $file_ext = substr($filename, strripos($filename, '.')); // get file name
        $filesize = $_FILES["file"]["size"];
           // Rename file
        $newfilename = $Bookname.$file_ext;
       
        // Rename file
	

           move_uploaded_file($_FILES["file"]["tmp_name"], "./Images/books/".$newfilename);
				 $sql = "INSERT INTO books (Bookname,Author,Genre,picture,description,cost,orderstatus)
                 VALUES ('$Bookname','$Author','$Genre','$newfilename','$description','$cost',0)";
            if(!mysqli_query($mysqli,$sql))
				{
               echo "<script>alert(' Server Busy! Please try again');document.location.href=('BooksUpload1.php');</script>";
				}

				else
				{
               $sql="SELECT * FROM books";
               $result=$mysqli->query($sql);?><?php
               echo "<script>alert('Book Added');document.location.href=('BooksUpload1.php');</script>";   
              
				}
    
}
  

?>
