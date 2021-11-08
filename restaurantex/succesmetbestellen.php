<?php
session_start();
include "classdatabase.php";

$pdo = new database("localhost", "restaurantex", "root", "", "utf8mb4");

$error = $_SESSION['error'] ?? '';
$_SESSION['error'] = '';


$reservatie_id = $_SESSION['reservatie_id'] ?? '';
$reorder = $_GET['reorder'] ?? '';


if($reservatie_id && $reorder == 'yes') {
  // get reservation details
  $reservatie = $pdo->reservatie($reservatie_id);

  // update allow_klant to 0
  $pdo->disallowreservatie($reservatie_id);

}

if(isset($_POST['pieter'])){

  $code = $_POST['code'] ?? '';
  $naam = $_POST['naam'] ?? '';
  $reservatie_id = $_POST['reservatie_id']?? '';
  $menuitem_id = $_POST['menuitem_id']?? '';
  $geserveerd = $_POST['geserveerd']?? '';
  $aantal = $_POST['aantal']?? '';
  $pdo->bestellingen($code, $naam, $reservatie_id, $menuitem_id, $geserveerd, $aantal);

}

?>



<!DOCTYPE html>
<html>
 <head>
  <title></title>
   </head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <meta charset="utf-8">
  <!-- Somehow I got an error, so I comment the title, just uncomment to show -->
  <!-- <title>Responsive Navigation Bar</title> -->
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="mainstyle.css">
<body style="background: #6E6E6E">
    <nav>
      <ul>
        <li class="logo">Hotel Der Tuin</li>
        <li class="items"><a href="index.php">Website overview </a></li>
        <li class="items"><a href="advise.php">Advise</a></li>
        <li class="items"><a href="indexreservaties.php">Reservaties</a></li>
        <li class="items"><a href="contact.php">Contact</a></li>
       <!--  <li class="items"> <a href="loginCustomer.php"> <button class="btn btn-primary" type="submit"> Login </button></a><li>   -->
      </ul>
    </nav>
    <div class="container"> 
        <div class="img1">
          <img src="images/png1.jpg" style="width:45%; float:center;height: 280px;" >
          <img src="images/png2.jpg" style="width:40%; float:center; height: 280px;">
        </div>  
    </div>

  
</body>
</html>
