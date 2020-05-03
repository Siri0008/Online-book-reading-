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
<div class="content">
    <div class="container">
    <form  method="post" onSubmit="return validate_password_reset();">
        <div class="row">
             <div class="col-md-3 col-lg-3 "></div>
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
        <div class="signup">
            <label for="name">Name</label><br>
            <input type="text" id="name" name="name" value="<?php echo $_SESSION["name"]?>" required> <br>
       
            <label for="mobilenumber">Phone Number</label><br>
            <input type="tel" id="mobilenumber" name="mobilenumber"value="<?php echo $_SESSION["mobilenumber"]?>"required><br>
			
			 <div class="login">
             <div><label for="Password">Change Password:</label></div>
             <div>
             <input type="password" name="member_password" id="member_password" class="input-field" ></div>
			</div>
        </div>
         <div class="submit">
            <input type="submit" name="submit" value="Update Profile"><br>
        </div>
        </div>
    </form>
    <?php
                 require_once "Db.php";
                 // Check connection    
                 
                 if ($mysqli->connect_error) {
                      die("Connection failed: " . $mysqli->connect_error); 
                  } 
                 if(isset($_POST['submit'])){
                    $name=$_POST["name"];
                    $mobile_err="";
                    $mobilenumber= $_POST["mobilenumber"];
					$password=$_POST["member_password"];
                    if(empty($password)){
                        $passwordhash=$_SESSION["password"];
                    }
                    else{
                        $passwordhash= password_hash($password, PASSWORD_DEFAULT);
                    }
                    $id=$_SESSION["id"];
                    
                    if(strcmp($mobilenumber,$_SESSION["mobilenumber"])){
                        $check_mobile = "SELECT mobilenumber FROM users WHERE mobilenumber = '$mobilenumber'";

                        $find_mobile = $mysqli->query($check_mobile);
    

                       if($find_mobile->num_rows)
                         {
                                 echo "$mobilenumber already exists in our database! Please try again with a different Mobile Number.";
                                 $mobile_err="invalid";
                         }
                    }
                    if(empty($mobile_err)){
                    $sql= "UPDATE  `users`
                        SET name= '$name', mobilenumber='$mobilenumber' ,password='$passwordhash'
                        WHERE  id ='$id'";
                       
                     if(!mysqli_query($mysqli,$sql))
                    {
                        echo "Server Busy! Please try again";
                    } 
    
                    else
                    {
                        $_SESSION["name"]=$name;
                        $_SESSION["mobilenumber"] =$mobilenumber;
						$_SESSION["password"]=$password;
                       echo "<script>alert('Succesfully Edited');document.location.href='Mybooks.php';</script>";
                    }
                     
                 }
                 
  
                   
                 }
    ?>
    </div>
</div>
<?php include('Inc/Footer.php');?>
