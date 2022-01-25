<?php
$servername = 'localhost';
$dbname = 'knltb';
$username = 'root';
$password = '';

try {
	$dbConn = new PDO("mysql:host={$servername};dbname={$dbname}", $username, $password);
	$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch(PDOException $e) {
	echo $e->getMessage();
}
?>