<?php
session_start();
include "classdatabase.php";

$reservatie_id = $_GET['reservatie_id'] ?? '';
$reservatie_bar_id = $_GET['reservatie_bar_id'] ?? '';
$reorder = $_GET['reorder'] ?? '';
$klant =  $_GET['naam'] ?? '';
$klant_id = $_GET['naam_id'] ?? '';

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
        <img src="images/png01.jpg" style="width:25%; float:center;height: 280px;" >
        <img src="images/png01.jpg" style="width:40%; float:center; height: 280px;">
        <img src="images/pn11.jpg" style="width:25%; float:center; height: 280px;">
      </div>   
      <p style="font-size: 22px; margin-top: 40px; color: #FFF;" >
       Waar wilt u uit kiezen.. 
      </p>
      <br>
      <a href="voorkamernummer.php?reservatie_id=<?php echo $reservatie_id; ?>&klant=<?php echo $klant; ?>&klant_id=<?php echo $klant_id; ?>&reorder=<?php echo $reorder; ?>" 
        style="font-size: 20px;" calss="text-danger"> Restaurant!</a>
      <br>
      <p style="font-size: 20px; margin-top: 40px; color: #FFF;" >
      OF 
      </p>
      <br>
      <a href="barchoose.php?reservatie_bar_id=<?php echo $reservatie_bar_id; ?>&klant=<?php echo $klant; ?>&klant_id=<?php echo $klant_id; ?>&reorder=<?php echo $reorder; ?>" 
        style="font-size: 20px;" calss="text-danger"> Bar!</a>       
       
</div>
</body>
</html>
