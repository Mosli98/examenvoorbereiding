<?php  
include_once "classdatabase.php";

	$id = $_POST["id"];
	$tafel=$records["tafel"];
	$datum=$records["datum"];
	$tijd=$records["tijd"];
	$klant=$records["klant"];
	$allergieen=$records["allergieen"];
	$opmerkingen=$records["opmerkingen"];

$pdo = new database("localhost", "restaurantex", "root", "", "utf8mb4");
//echo "Calling login<br>";

$pdo->obercanadd($tafel, $datum, $tijd, $klant, $allergieen, $opmerkingen);
header('location:waiteroverzicht.php');
?>