<?php  
include_once "classdatabase.php";

$username = $_POST['username'];
$password = $_POST['password'];
$pdo = new database("localhost", "restaurantex", "root", "", "utf8mb4");
//echo "Calling login<br>";

$pdo->barmanadd($username, $password);
header('location:adminoverzichtbarman.php');
?>