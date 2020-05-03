<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: Welcome.php");
    exit;
}
 
// Include config file
require_once "Db.php";
 
// Define variables and initialize with empty values
$mobilenumber = $password = "";
$mobilenumber_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["mobilenumber"]))){
        $mobilenumber_err = "Please enter Registered Mobile Number.";
    } else{
        $mobilenumber = trim($_POST["mobilenumber"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($mobilenumber_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id,name,mail,mobilenumber,password FROM users WHERE mobilenumber = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_mobilenumber);
            
            // Set parameters
            $param_mobilenumber = $mobilenumber;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();
                
                // Check if username exists, if yes then verify password
                if($stmt->num_rows == 1){                    
                    // Bind result variables
                    $stmt->bind_result($id, $name,$mail,$mobilenumber, $hashed_password);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;                            
                            $_SESSION["mail"]=$mail;
                            $_SESSION["name"]=$name;
                            $_SESSION["mobilenumber"]=$mobilenumber;
							$_SESSION["password"]=$hashed_password;
                            // Redirect user to welcome page
                            header("location: Welcome.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "Wrong password";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $mobilenumber_err = "No account found with that Mobile Number.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
 
            // Close statement
            $stmt->close();
        }
    }
    
    // Close connection
    $mysqli->close();
}
?>
<?php include('Inc/Header.php');?>
<style>
        .topnav a.active {
  background-color: #4CAF50;
  color: white;
}
</style>
    <div class="container">
        <h1 style="text-align:center;">LOGIN As User</h1>
        <p style="text-align:center; font-size:16px;">Do not have account.Register <b><a href="SignupU.php">here.</a></b></p>
 
       <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
           <div class="row">
            <div class="col-md-4 col-lg-4 "></div>
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
           <div class="login">
            <label for="mobilenumber">Mobile Number:</label><?php echo (!empty($mobilenumber_err)) ? $mobilenumber_err : ''; ?><br>
            <input type="text" id="mobilenumber" name="mobilenumber" placeholder="Your Registered Mobile Number" required><br><br>
           </div>
           <div class="login">
            <label for="password">PASSWORD:</label><?php echo (!empty($password_err)) ? $password_err : ''; ?><br>
            <input type="password" id="password" name="password" placeholder="Your Password" required><br><br>
            
           </div>
        
           <div class="submit">
           <input type="submit" value="Login"><br>      
           </div>
		   <a class="foot1" href="ForgotpasswordU.php"><p>Forgot Password?</p></a>
           </div>
        </div>
       </form>
    </div>
    </div>
    <?php include('Inc/Footer.php');?>