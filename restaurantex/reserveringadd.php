<?php  
include_once "classdatabase.php";
$naam = $_POST['naam'];
$telefoon = $_POST['telefoon'];
$email = $_POST['email'];
$pdo = new database("localhost", "restaurantex", "root", "", "utf8mb4");
//echo "Calling login<br>";

$pdo->oberaddreservering($naam, $telefoon, $email);
header('location:klantenoverzicht.php');


?>