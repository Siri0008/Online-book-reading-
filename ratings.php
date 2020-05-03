<?php
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: LoginU.php");
    exit;
}
?>
<?php include('Inc/Header.php'); 
	require "Db.php";
	$conn = "SELECT AVG(rating) as AVGRATE from rating_data where status='1'";
    $result =$mysqli->query($conn); 
    $row=$result->fetch_array();
	$AVGRATE=$row['AVGRATE'];
	$conn= "SELECT count(rating) as Total from rating_data where status='1'";
    $result =$mysqli->query($conn); 
    $row=$result->fetch_array();
	$Total=$row['Total'];
	$query = mysqli_query($conn,"SELECT count(remark) as Totalreview from  rating_data where status=1 ");
	$row = mysqli_fetch_array($query);
    $Total_review=$row['Totalreview'];
    $conn="SELECT rating,email,name,date_time from rating_data where status=1 order by date_time desc limit '4' ";
    $review =$mysqli->query($conn);
    $conn="SELECT count(*) as Total,rating from rating_data group by rating order by rating desc";
    $rating = $mysqli->query($conn);?>
    		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/Mystyle.css">
	<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
	<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
	<link rel='stylesheet' href='https://raw.githubusercontent.com/kartik-v/bootstrap-star-rating/master/css/star-rating.min.css'>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <div class="row container">
    <div class="col-md-5">
	<h3><b>Rate</b></h3>
			<div id="rating_div">
				<div class="star-rating">
					<span class="fa fa-star-o" data-rating="1" style="font-size:20px;"><?php$_SESSION["rate"]='1';?></span>
					<span class="fa fa-star-o" data-rating="2" style="font-size:20px;"><?php$_SESSION["rate"]='2';?></span>
					<span class="fa fa-star-o" data-rating="3" style="font-size:20px;"><?php$_SESSION["rate"]='3';?></span>
					<span class="fa fa-star-o" data-rating="4" style="font-size:20px;"><?php$_SESSION["rate"]='4';?> </span>
					<span class="fa fa-star-o" data-rating="5" style="font-size:20px;"><?php$_SESSION["rate"]='5';?></span>
					<input type="hidden" name="whatever3" <?php $row['rate']="rate"?> class="rating-value" value="0">
				</div>
			</div>
</div>

</div><br>
<div class="col-md-4">
<input type="text" class="form-control" name="name" id="name" <?php $row['$name']="name"?> placeholder="Name"><br>
<input type="text" class="form-control" name="email" id="email" <?php $row['$email']="email"?> placeholder="Book Name"><br>
<form method="post" action="Save_rating.php">
<?php $_SESSION["name"]=$row['$name'];
$_SESSION["email"]=$row['$email'];?>
<button  class="btn btn-default btn-sm btn-info" id="srr_rating" name="rating">Submit</button></form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/index.js">document</script>
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