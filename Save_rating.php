<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: LoginU.php");
    exit;
}
?>
<?php
    require_once 'Db.php';
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    if(isset($_POST['rating'])){
	$rate=$_SESSION['rate'];
	$name=$_SESSION['name'];
	$email=$_SESSION['email'];
	$status=1;
	$date_time=date("Y-m-d H:i:s");
    //Check email id already exists or not
    $sql="SELECT count(*) AS TOTAL FROM rating_data WHERE email='$email'";
    $result=$mysqli->query($sql);
	$row = $result->fetch_array();
	$TOTAL_COUNT=$row['TOTAL'];
	if($TOTAL_COUNT==0){
		$sql="INSERT INTO `rating_data`( rating,name,email,date_time,status) VALUES ($rate,$name,$email,$date_time,$status)";
		$result=$mysqli->query($sql);
       echo "<script>alert('Rating added sucessfully!');document.location.href=('LoginU.php');</script>";
    }
}
       $mysqli->close();
?>