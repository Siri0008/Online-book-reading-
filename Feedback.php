<?php
// Initialize the session
// Check if the user is logged in, if not then redirect him to login page
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: LoginU.php");
    exit;
}
?>
<?php include('Inc/Header.php'); ?>
<div class=container>
    <form method="post" action="Feedback_action.php" enctype='multipart/form-data'>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12"></div>
        <div class="col-lg-4 col-md-4 col-cm-12">
            <h3 style="text-align:centre">Feedback</h3>
            <textarea id="feedback" type="text" name="feedback" rows="10" cols="50"></textarea>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5"></div>
            <div class="submit col-lg-2">
                <input type="submit" value="submit" name="submit"><br>
            </div>
         </div>
    </div>
    </form>
</div>
    <?php include('Inc/Footer.php'); ?>
