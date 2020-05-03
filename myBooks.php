<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: LoginU.php");
    exit;
}?>
<?php include('Inc/Header.php');?>
<div class="container">
<div class="row">
        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
            
                
                <div>
                <img src="Images/person.png" alt="" style="width:150px;height:150px;border-radius:50%">
                <h4 style="color:black"><?php echo htmlspecialchars($_SESSION["name"]) ?></h4>
                <a href="tel:<?php $_SESSION["mobilenumber"]?>"><h4 style="color:black"><i class="fa fa-phone"></i>+91 <b><?php echo htmlspecialchars($_SESSION["mobilenumber"]); ?></b></h4></a>
                <a href="mailto:<?php $_SESSION["mail"]?>"><h4 style="color:black"><i style="font-size:18px;"  class="material-icons">email</i><?php echo htmlspecialchars($_SESSION["mail"])?></h4></a>
                <a href="EditprofileU.php"><h4 style="color:black"><i class="fa fa-edit"></i> Edit Profile</h4></a>
                </div>
            
        </div>
        <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
        <h1 style="margin-top:100px;text-align:center;color:black">Your Profile</h1>
        </div>
</div>
        <?php
        require_once "Db.php";
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
$name=$_SESSION["name"];
$myemail=$_SESSION["mail"];?>
<hr>
<h1 style="text-align:center;">Your Cart Books</h1>
<?php $sql_ = "SELECT * FROM cart_details WHERE name_cart='$myemail'";
$result_ = $mysqli->query($sql_);?>
<?php
if ($result_->num_rows > 0) {?>
   <?php while($row = $result_->fetch_assoc()) { 
 
                                                    $book_cart=$row["book_cart"];
                                                     $conn="SELECT * FROM `books` WHERE Bookname='$book_cart'";
                                                    $result2 = $mysqli->query($conn);
                                                    if ($result2->num_rows > 0) {?>
                                                    <?php while($row = $result2->fetch_assoc()) { ?>
                                                        <div class="flip-card col-lg-4 col-md-4 col-sm-12 col-xs-12"><br>
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
                                                 <div><form method="post" action="cart_remove.php"><?php $_SESSION["ID"]=$row['Id'];
                                                $_SESSION["Bookname"]=$row['Bookname'];?>
                                                <input type="submit" id="cancel" name="cancel" value="Delete from cart"></form>
                                                </div>
                                                       </div>
                                                        </div>
                                                    </div>
                                                <?php   } ?>
                                                <?php } }
                                               }?>
                                               <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<hr>
<h1 style="text-align:center">Your Books </h1><br>

<?php $sql_1 = "SELECT * FROM purchase_details WHERE Cname='$myemail'";
$result_1 = $mysqli->query($sql_1);?>
<?php
if ($result_1->num_rows > 0) {?>
   <?php while($row = $result_1->fetch_assoc()) { 
 
                                                 $BookP=$row["BookP"];
                                                
                                                $conn_1="SELECT * FROM `books` WHERE Bookname='$BookP'";
                                                $result = $mysqli->query($conn_1);
                                                if ($result->num_rows > 0) {?>
                                                <?php while($row = $result->fetch_assoc()) { ?>
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
                                                <?php } }
                                               }?>
                                                           
                                                    
                                            
                                        <?php 
$mysqli->close();
?>
</div>
</div>
</div>
</div>
<style>
        @media screen and (min-width: 1100px) {.f{
            position:fixed;
                                     bottom:0;
                                     right:0;
                                     left:0;
                                 }
                                 .content{
                                     height:3000px !important;
                                 }}
                                 </style> 
<?php include('Inc/Footer.php');?>