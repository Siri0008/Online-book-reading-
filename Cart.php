<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: LoginU.php");
    exit;
}
?>
<?php include('Inc/Header.php'); 
require_once "Db.php";
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 
$sql = "SELECT Id,Bookname,Author,Genre,picture,description,cost FROM books";
$result = $mysqli->query($sql);
if ($result->num_rows > 0){?>
        <div class="container">
        <h1 style="text-align:center;">Books Available</h1><?php
        while($row = $result->fetch_assoc()) {?>
            <div class="flip-card col-lg-4 col-md-4 col-sm-12 col-xs-12">
                          <div class="flip-card-inner">
                            <div class="flip-card-front">
                                    <h4><?php echo $row["Bookname"] ?></h4> 
                                    <img src="Images/books/<?php echo $row["picture"] ?>" alt="<?php echo $row["Bookname"]?>" style="width:200px;height:200px;">
                                     <h5 style="font-size:16px;"><b>Book Id:<?php echo $row["Id"] ?></b></h5>
                                     <b><p style="font-size:16px;">Cost:<?php echo $row["cost"] ?></p>
                                     <p ><?php echo $row["description"] ?></p></b>
                             </div>
                                     <div class="flip-card-back">
                                        <h2 style="text-decoration:underline;">Genre</h2>
                                        <h4><?php echo $row["Genre"] ?></h4>
                                      <h2 style="text-decoration:underline;">Author Name</h2>
                                      <h4><?php echo $row["Author"] ?></h4> 
                                      <?php $Bookname=$row["Bookname"];?>
                                      
                
         <div>
         <a href="cart_action.php?Id=<?php echo $row['Id'];?>&& Bookname=<?php echo $row['Bookname']?>"><input type="submit" id="cart" name="cart" value="Add to cart"></a><br></div>
         <br>
       
      
      
      <form method="post" action="Buy.php">
      <div>
         <input  type="submit" id="buy" name="buy" value="Buy"><a href="Buy.php"></a></div>
      </div></form>
                            </div>
                         </div>
              <?php   } ?>
            <?php  }?>
<?php 
    $mysqli->close();
?>
<style>
        @media screen and (min-width: 1100px) {.f{
            position:fixed;
                                     bottom:0;
                                     right:0;
                                     left:0;
                                 }
                                 .content{
                                     height:2000px !important;
                                 }}
                                 </style> 
<?php include('Inc/Footer.php');?>
