<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    text-align:left;
    border: 1px solid black;
}
table {
  border-collapse: collapse;
  width: 100%;
}
th, td {
  padding: 15px;
}
</style>
</head>
<body>
<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: LoginA.php");
    exit;
}
?>
<?php include('Inc/Header.php');?>
    <div class="container" style="text-align:center;">
    <h3>Ratings by people!</h3>
<?php
    require_once "Db.php";
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    $total_rating=NULL;
$sql = "SELECT email FROM rating_data";
    $result = $mysqli->query($sql);
    $conn="SELECT AVG(rating) AS $total_rating FROM rating_data WHERE email='email'";
    $total_ratin=$mysqli->query($conn);
if ($result->num_rows >= 0) {
    echo "<table><tr><th>Book Name</th><th>Average Rating</th></tr>";
    while($row = $result->fetch_assoc()) {?>
    <tr><td><?php echo $row["email"] ?> </td>
        <td><?php echo $total_rating ?> </td>
    </tr>
    <style>
    @media screen and (min-width: 1100px) {.f{
                                position:fixed;
                                 bottom:0;
                                 right:0;
                                 left:0;
                             }
                             .content{
                                 height:1000px !important;
                             }}
                             </style> 
<?php } ?>
    </table>
    <?php }
else {
    echo "0 Ratings!";?>
    <style>
    @media screen and (min-width: 1100px) {.f{
                                position:fixed;
                                 bottom:0;
                                 right:0;
                                 left:0;
                             }
                             .content{
                                 height:1000px !important;
                             }}
                             </style> 
<?php }
$mysqli->close();
    ?>
    </div>
<?php include('Inc/Footer.php');?> 
