<?php
include "classdatabase.php";

session_start();

if(isset($_POST['submit'])){
// instance van je database class

$fieldnames = array("username", "password");

$error = false;

  foreach ($fieldnames as $fieldname) {
    if (isset($_POST[$fieldname]) || empty($_POST[$fieldname])) {
       $error = true;
    }
  //   if(!empty($_POST[$fieldnames])){
  //   echo "<br> Plz fill the required fields in!";
  // }
  }
   if (!$error) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $pdo = new database("localhost", "drempeltoets", "root", "", "utf8mb4");
    $pdo->InsertTabellen($username, $password);
    echo '<hr>';
   }
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
      <li class="logo">Restaurant</li>
      <li class="items"><a href="index.php">Website overview </a></li>
      <li class="items"><a href="advise.php">Advise</a></li>
      <li class="items"><a href="indexreservaties.php">Reservaties</a></li>
      <li class="items"><a href="contact.php">Contact</a></li>
     <!--  <li class="items"> <a href="loginCustomer.php"> <button class="btn btn-primary" type="submit"> Login </button></a><li>   -->
    </ul>
  </nav>

  <div class="container"> 
      <div class="img1">
        <img src="images/pn11.jpg" style="width:45%; float:center;height: 280px;" >
        <img src="images/png01.jpg" style="width:40%; float:center; height: 280px;">
      </div>
      
      <div style="font-size: 35px; margin-top: 40px;" class="text-warning text-center">
       Contact us at:
      </div> 
      <p style="font-size: 22px; margin-top: 40px; color: #FFF;" >
       <br> 
       Local number: 012384791
       <br> 
       Adres :  Norwaysrteer 4124
       <br> 
       ZIP : 3133RWQE
       <br>
       email: restaurant@hotmail.com
       </p>

  </div> 




      
  
</body>
</html>

