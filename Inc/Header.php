<!DOCTYPE html>
<html>
	<head>
	<title>BUCH!!!</title>
		<link rel="stylesheet" type="text/css" href="Mystyle.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script>
		function myfunction(){
			var x=document.getElementByld("myTopnav");
			if(x.className==="topnav"){
				x.className+="responsive";
			}
			else{
				x.className="topnav";
			}
		}
		</script>
	</head>
	<body>
		<div class="content">
			<div class="topnav" id="myTopnav">
			<a href="Welcome.php">Home</a>
			<?php 
				if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) { // check if session named 'id' is exist
         ?>
			<a href="LoginA.php">Login as admin</a>
			<a href="LoginU.php">Login as user</a>
			<a href="SignupU.php">Signup as user</a>
              <?php } 
          else { ?>
         <a href="LogoutU.php">Log Out</a>
         <a href="Feedback.php">Feedback</a>
         <a href="Cart.php">Cart</a>
         <a href="myBooks.php">Profile</a>
         <a href="Buy.php">Buy</a>
         <a href="Browse.php">Browse</a>
		 <a href="ratings.php">Rate here</a>
		 <a href="ViewRatings.php">View Ratings</a>
		 <a href="Exchange.php">Exchage Book</a>
         <?php }?>
          
        <a href="javascript:void(0);" class="icon" onclick="myfunction()">
            <i class="fa fa-bars"></i>
        </a>
        </div>