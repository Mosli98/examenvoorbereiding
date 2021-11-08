<?php 

session_start();
include_once "classdatabase.php";

$_SESSION['error'] = '';

$klant = $_POST['klant'];

$email = $_POST['email'];
$telefoon = $_POST['telefoon'];
// $allergieen = $_POST['allergieen'];
$opmerkingen = $_POST['opmerkingen'];
$pdo = new database("localhost", "restaurantex", "root", "", "utf8mb4");

// $_SESSION['email'] = $email;
// $_SESSION['allergieen'] = $allergieen;
// $_SESSION['opmerkingen'] = $opmerkingen;

// validate phone
if(strlen($telefoon) != 10) {
	$_SESSION['error'] = 'Telefoon should be 10 numbers';
	header("Location: indexreservaties.php?error=yes");
	exit;
} elseif(substr($telefoon, 0, 2) != '06') {
	$_SESSION['error'] = 'Telefoon should be begin with 06';
	header("Location: indexreservaties.php?error=yes");
	exit;
}
else
{
	// $record_id = $pdo->klantadd($klant, $adres, $plaats, $postcode, $telefoon);
	$record_id = $pdo->klantadd($klant, $telefoon, $email);
	header("Location: tafelnummer.php?klant_id=$record_id&klant=$klant");
	exit;	
}
?>