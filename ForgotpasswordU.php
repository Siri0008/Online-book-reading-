<?php
    if(isset($_POST["forgotpassword"])){
        session_start();
require_once "Db.php";      
$mail=$_POST["mail"];
$mobilenumber=$_POST["mobilenumber"];
if(empty($mail)&&empty($mobilenumber)){
    $error_message= "Please fill any one of them";
}
else{
$condition = "";
if(!empty($_POST["mobilenumber"])) 
    $condition = " mobilenumber = '" . $_POST["mobilenumber"] . "'";
if(!empty($_POST["mail"])) {
    if(!empty($condition)) {
        $condition = $condition . " and ";
    }
    $condition = $condition ." mail = '" . $_POST["mail"] . "'";
}

if(!empty($condition)) {
    $condition = " where " . $condition;
}

$sql = "Select * from users " . $condition;
$result = mysqli_query($mysqli,$sql);
$user = mysqli_fetch_array($result);

if(!empty($user)) {
    require_once("mail.php");
} else {
    $error_message = 'No User Found';
}
}
session_destroy();
 }
 
?>
<?php include('Inc/Header.php');?>
    <div class="container">
        <form name="frmForgot" id="frmForgot" method="post" onSubmit="return validate_forgot();">
        <h1 style="text-align:center">Forgot Password?</h1>
        <div class="row">
            <div class="col-md-4 col-lg-4 col-sm-12"></div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <?php if(!empty($success_message)) { ?>
                <div class="success_message"><?php echo $success_message; ?></div>
                <?php } ?>
 
                <div id="validation-message">
                    <?php if(!empty($error_message)) { ?>
                <?php echo $error_message; ?>
                <?php } ?>
                </div>
 
                <div class="sell">
                    <div><label for="rollnumber">Mobile_Number
                    </label></div>
                    <div><input type="text" name="mobilenumber" id="rollnumber"> Or</div>
                </div>
                
                <div class="sell">
                    <div><label for="email">Email</label></div>
                    <div><input type="email" name="mail" id="mail"></div>
                </div>
            </div>
        </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12"></div>
                <div class="submit col-lg-4 col-md-4 col-sm-12">
                    <div><input type="submit" id="forgotpassword" name="forgotpassword" value="Submit"></div>
                </div>
            </div>  
        </form>
    </div>
 

<?php include('Inc/Footer.php');?>
