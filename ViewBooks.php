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
    <h3>All the Books !</h3>
<?php
    require_once "Db.php";
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    $sql = "SELECT Id, Bookname, Author,Genre,cost FROM books";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Book Name</th><th>Author</th><th>Genre</th><th>Cost</th></tr>";
    while($row = $result->fetch_assoc()) {?>
    <tr><td><?php echo $row["Id"] ?> </td>
        <td><?php echo $row["Bookname"] ?> </td>
        <td><?php echo $row["Author"]  ?></td>
        <td><?php echo $row["Genre"] ?> </td>
        <td><?php echo $row["cost"] ?></td>
    </tr>
<?php } ?>
    </table>
    <?php }
else {
    echo "0 Books!";?>
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
