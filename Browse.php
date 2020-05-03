<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: LoginU.php");
    exit;
}
?>
<?php include('Inc/Header.php');?>
        <div class="container" style="text-align:center;">
        <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4" style="font-size:20px;">
        <form method="post">
        <label for="Genre">Genre:</label>
        <select type="text" id="Genre" name="Genre" required>
                        <option value="Fantasy">Fantasy</option>
                        <option value="Drama">Drama</option>
                        <option value="Romance">Romance</option>
        </select>
        <input type="submit" value="Go" style="width:30%;" name="submit1"><br>
        </form>
        </div>
        <div class="col-lg-4"></div>
        </div>
        <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4" style="font-size:20px;">
        <form method="post">
        <label for="Author">Author:</label>
        <input type="search" id="Author" name="Author" style="width:30%">
        <input type="submit" value="Go" style="width:30%;" name="submit2" style="text-align:right;">
        </form>
        </div>
        <div class="col-lg-4"></div>
        </div>
        <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4" style="font-size:20px;">
        <!--<form method="post">
        <label for="Genre">Book Name:</label>
        <input type="submit" value="Go" style="width:30%;" name="submit"><br>
        </form>-->
        <form method="post">
        <label for="Bookname">BookName:</label>
        <input type="search" id="Bookname" name="Bookname" style="width:30%">
        <input type="submit" value="Go" style="width:30%;" name="submit3" style="text-align:right;">
        </form>
        </div>
        <div class="col-lg-4"></div>
        </div>
<div class="row">
<?php
require_once "Db.php";
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 
   
  if (isset($_POST['submit1'])){
         $Genre=$_POST['Genre'];?>
          <h1 ><?php echo $Genre;?></h1>
          <?php $sql = "SELECT * FROM books WHERE Genre='$Genre' AND orderstatus= '0'";
          $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
             // output data of each row
                 while($row = $result->fetch_assoc()) { ?>
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
                             </div>
                            </div>
                         </div>
              <?php   } ?>
      <?php } 
      else { ?>
        <h1>Book not available!!</h1>
        <style>
        @media screen and (min-width: 700px) {.f{
                                    position:fixed;
                                     bottom:0;
                                     right:0;
                                     left:0;
                                 }
                                 .content{
                                     height:1000px !important;
                                 }}
                                 </style> 
     <?php } 
       }
else if (isset($_POST['submit2'])){
  $Author=$_POST['Author'];?>
   <h1 ><?php echo $Author;?></h1>
   <?php $sql = "SELECT * FROM books WHERE Author='$Author' AND orderstatus= '0'";
   $result = $mysqli->query($sql);

 if ($result->num_rows > 0) {
      // output data of each row
          while($row = $result->fetch_assoc()) { ?>
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
                      </div>
                     </div>
                  </div>
       <?php   } ?>
<?php } 
else { ?>
   <h1>Book not available!!</h1>
   <style>
   @media screen and (min-width: 700px) {.f{
                               position:fixed;
                                bottom:0;
                                right:0;
                                left:0;
                            }
                            .content{
                                height:1000px !important;
                            }}
                            </style> 
<?php } 
  }
else if (isset($_POST['submit3'])){
  $Bookname=$_POST['Bookname'];?>
   <h1 ><?php echo $Bookname;?></h1>
   <?php $sql = "SELECT * FROM books WHERE Bookname='$Bookname' AND orderstatus= '0'";
   $result = $mysqli->query($sql);

 if ($result->num_rows > 0) {
      // output data of each row
          while($row = $result->fetch_assoc()) { ?>
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

                      </div>
                     </div>
                  </div>
       <?php   } ?>
<?php } 
 else{?>
  <h1>Book not available!!</h1>
  <style>
  @media screen and (min-width: 1100px) {.f{
                              position:fixed;
                               bottom:0;
                               right:0;
                               left:0;
                           }
                           .content{
                               height:1000px !important;
                           }}
                           </style> 
 <?php }
}
else {
     $sql = "SELECT * FROM books WHERE orderstatus= '0'";
     $result = $mysqli->query($sql);
     if ($result->num_rows > 0) {
      // output data of each row
          while($row = $result->fetch_assoc()) { ?>
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
                             </div>
                     </div>
                  </div>
       <?php   } ?>
<?php } 
 else{?>
    <h1>Book not available!!</h1>
    <style>
    @media screen and (min-width: 1100px) {.f{
                                position:fixed;
                                 bottom:0;
                                 right:0;
                                 left:0;
                             }
                             .content{
                                 height:1000px !important;
                             }}
                             </style> 
   <?php }
}

$mysqli->close();
?>
</div>
</div>
<?php include('Inc/Footer.php');?>