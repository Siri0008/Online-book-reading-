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
    <h1 style ="text-align:center;">BUY THE BOOK</h1>
         <form method="post">
            <div class="row">            
                <div class="col-lg-4 col-sm-12 col-md-4"></div>
                <div class="col-lg-4 col-sm-12 col-md-4">
                <label style="font-size:24px;" for="id_name">Enter the Book Name</label><br>
                <input style="font-size:20px;width:50%;"type="text" id="uniqueid" name="uniqueid" placeholder="Name of the Book" required>
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
                           $ID=$_POST['uniqueid'];
                           $sql = "SELECT * FROM books where Bookname='$ID'";
                           $result = $mysqli->query($sql);
                           if ($result->num_rows > 0) {
                             while($row = $result->fetch_assoc()) { 
                                 if($row["orderstatus"]>='0'){?>
                                 <h2><?php echo $row["Bookname"] ?></h2> 
                                 <img src="Images/books/<?php echo $row["picture"] ?>" alt="Avatar" style="width:200px;height:200px;">
                                 <h3>Author:<?php echo $row["Author"] ?></h3>
                                 <?php $_SESSION["ID"]=$row["Id"];?>
                                 <h3 >COST:<?php echo $row["cost"] ?></h3>
                                 <b><p ><?php echo $row["description"] ?></p></b>
                                 <div class="submit">
                                 <p style="color:red;">Presently we dont have payment options.</p>
                                 <?php $_SESSION["ID"]=$row['Id'];
                                        $_SESSION["Bookname"]=$row['Bookname'];?>
                                 <form method="post" action="Buy_action.php">
                                 <input type="submit" value="Proceed to payment" name="payment"><br>
                                 </form>  
                                  </div>
                        <?php   } 
                            } } 
                          else { ?>
                        <h3>Sorry<br>
                         The Book Name: <?php echo $ID ?> is Invalid or not available here!<br>
                       </h3>
                      <?php }
                    } 
                    else{?>
                            <style>
                            @media screen and (min-width: 700px) {.f{
                               position:fixed;
                                bottom:0;
                                right:0;
                                left:0;
                            }
                            .content{
                                height:700px !important;
                            }}
                            </style>
                    <?php }
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
<?php include('Inc/Footer.php'); ?>
