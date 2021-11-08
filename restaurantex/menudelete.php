<?php 
include_once "classdatabase.php";
$id = $_GET['id'];
$pdo = new database("localhost", "restaurantex", "root", "", "utf8mb4");
//echo "Calling login<br>";
$pdo->menudelete($id);
header('location:adminmenu.php');

?>