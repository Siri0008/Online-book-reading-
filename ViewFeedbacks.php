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
<?php include('Inc/HeaderA.php');?>
    <div class="container" style="text-align:center;">
    <h3>All the Feedbacks !</h3>
<?php
    require_once "Db.php";
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    $sql = "SELECT Fmail,feedback FROM feedbacks";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Mail-Id</th><th>Feedback</th></tr>";
    while($row = $result->fetch_assoc()) {?>
    <tr>
        <td><?php echo $row["Fmail"] ?> </td>
        <td><?php echo $row["feedback"]  ?></td>
    </tr>
<?php } ?>
    </table>
    <?php }
else {
    echo "0 Feedbacks!";?>
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
<?php include('Inc/Footer.php');?> 
