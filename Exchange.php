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
<div class="container">
    <h1 style ="text-align:center;">BUY THE BOOK</h1>
         <form method="post">
            <div class="row">            
                <div class="col-lg-4 col-sm-12 col-md-4"></div>
                <div class="col-lg-4 col-sm-12 col-md-4">
                <label style="font-size:24px;" for="id_name">Enter the  old Book</label><br>
                <input style="font-size:20px;width:50%;"type="text" id="uniqueid" name="uniqueid" placeholder="Name of the Book" required>
                <label style="font-size:24px;" for="id-name">Enter the New Book</label><br>
                <input style="font-size:20px;width:50%;"type="text" id="uniqueid1" name="uniqueid1" placeholder="Name of the Book" required>
                <input type="submit" value="Go" style="width:20%; float:center;" name="submit"><br>
                </div>
            </div>
        </form>
        <div class="row">            
                <div class="col-lg-4 col-sm-12 col-md-4"></div>
                <div class="col-lg-4 col-sm-12 col-md-4" style="text-align:center; color:black;">
                <?php
                 require_once "Db.php";
                 // Check connection    
                 if ($mysqli->connect_error) {
                      die("Connection failed: " . $mysqli->connect_error); 
                  } 
                  if (isset($_POST['submit'])){
                           $ID1=$_POST['uniqueid'];
                           $ID2=$_POST['uniqueid1'];
                           $sql = "SELECT * FROM purchase_details where Cname='$_SESSION[name]' AND BookP='$ID1'";
                           $result = $mysqli->query($sql);
                           if ($result->num_rows > 0) {?><?php
                             while($row = $result->fetch_assoc()) {?><?php
                                    $conn="SELECT cost FROM books WHERE Bookname='$ID2'";
                                    $result2=$mysqli->query($conn);
                                    $row2=$result2->fetch_assoc();
                                    $cost2=$row2['cost'];
                                   
                                    $conn1="SELECT cost FROM books WHERE Bookname='$ID1'";
                                    $result1=$mysqli->query($conn1);
                                    $row1=$result1->fetch_assoc();
                                    $cost1=$row1['cost'];
                                   
                                    if(!strcmp($cost1,$cost2)){?>
                                        <h2>Exchanged Book</h2>
                                        <h2><?php echo $ID2 ?></h2> <?php
                                        $name=$_SESSION["mail"];
                                        $sql="DELETE FROM purchase_details WHERE Cname='$name' AND BookP='$ID1'";
                                        if(!mysqli_query($mysqli,$sql))
                                        {
                                            echo "<script>alert(' Server Busy! Please try again');document.location.href=('Exchange.php');</script>";
                                         }
                                        else{
                                            $Bookname=$ID2;
                                            $Cname=$_SESSION["mail"];
                                            $sql="SELECT * FROM `purchase_details` WHERE Cname='$Cname' AND BookP='$Bookname'";
                                            $result=$mysqli->query($sql);
                                        if ($result->num_rows > 0)
                                        {
                                             echo "<script>alert('Book Already Purchased');document.location.href=('Exchange.php');</script>";
                                            }
                                         else
                                             {
                                                 $sql="INSERT INTO purchase_details (Cname,BookP) 
                                                VALUES ('$Cname','$Bookname')";
                                                if(!mysqli_query($mysqli,$sql))
                                                {
                                                         echo "<script>alert(' Server Busy! Please try again');document.location.href=('Exchange.php');</script>";
                                                         
                                                 }
                                                else{
                                                            echo "<script>alert('Book Exchanged');document.location.href=('myBooks.php');</script>";
                                                            
                                                    }
                                                } 
                                            
                                            }?>
                                       
                                        
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
                                        <?php } 
                           else { 
                                     $ID1=$_POST['uniqueid'];
                                     $ID2=$_POST['uniqueid1'];?>
                            <h3>Sorry<br>
                             The Book <?php echo $ID1." with".$ID2 ?> cannot be Exchanged<br>
                            </h3>
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
                                                <?php }?>
                           <?php }
                       } 
                    }

$mysqli->close();
?>

                </div>
        </div>
</div>
</div>
<style>a.buy_ref,a.buy_ref:hover{
color:black;
}
</style>
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
<?php include('Inc/Footer.php'); ?>