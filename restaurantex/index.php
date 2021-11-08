<?php
include "classdatabase.php";

session_start();

if(isset($_POST['submit'])){
// instance van je database class

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
      <li class="logo">Restaurant Ex</li>
      <li class="items"><a href="index.php"> Menu </a></li>
      <li class="items"><a href="advise.php"> Advies </a></li>
      <li class="items"><a href="indexreservaties.php"> Reservaties </a></li>
      <li class="items"><a href="contact.php"> Contact </a></li>
     <!--  <li class="items"> <a href="loginCustomer.php"> <button class="btn btn-primary" type="submit"> Login </button></a><li>   -->
    </ul>
  </nav>
    <h1 class="text-warning text-center" > Bekijk onze menu!</h1>

  <div class="container"> 
      <div class="img1">
        <img src="images/examen.jpg" style="width:45%; float:center;height: 280px; margin-left: 285px" >
      </div>   
 </div>    
  <div class="container menu-box">
      <div class="col-lg-12">
        <br><br>
      <h1 class="text-warning text-center" > Hoofdgerechten</h1>
      <br>
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">
<!--           <th> Id </th> -->
          <th> Hoofdgerechten </th>
          <th> prijs </th>
        </tr>
        <?php  
        include_once "classdatabase.php";

            $pdo = new database("localhost", "restaurantex", "root", "", "utf8mb4");
            $records=$pdo->gerechtsoorten();
            foreach($records as $res) {
        ?>
        <tr class="text-center">
 <!--          <td> <?php echo $res['id'];?> </td>  -->
          <td> <?php echo $res['naam'];?> </td>
          <td> &euro;<?php echo $res['prijs'];?> </td>
        </tr>
        <?php
          } 
        ?>
      </table>  
    </div>
  </div>


  <div class="container menu-box">
      <div class="col-lg-12">
        <br><br>
      <h1 class="text-warning text-center" > Voordekleinjtes</h1>
      <br>
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">
<!--           <th> Id </th> -->
          <th> Hoofdgerechten </th>
          <th> prijs </th>
        </tr>
        <?php  
        include_once "classdatabase.php";

            $pdo = new database("localhost", "restaurantex", "root", "", "utf8mb4");
            $records=$pdo->voordekleinjtes();
            foreach($records as $res) {
        ?>
        <tr class="text-center">
 <!--          <td> <?php echo $res['id'];?> </td>  -->
          <td> <?php echo $res['naam'];?> </td>
          <td> &euro;<?php echo $res['prijs'];?> </td>
        </tr>
        <?php
          } 
        ?>
      </table>  
    </div>
  </div>

  <div class="container menu-box">
      <div class="col-lg-12">
        <br><br>
      <h1 class="text-warning text-center" > Voorgerechten</h1>
      <br>
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">
<!--           <th> Id </th> -->
          <th> Hoofdgerechten </th>
          <th> prijs </th>
        </tr>
        <?php  
        include_once "classdatabase.php";

            $pdo = new database("localhost", "restaurantex", "root", "", "utf8mb4");
            $records=$pdo->voorgerechten();
            foreach($records as $res) {
        ?>
        <tr class="text-center">
 <!--          <td> <?php echo $res['id'];?> </td>  -->
          <td> <?php echo $res['naam'];?> </td>
          <td> &euro;<?php echo $res['prijs'];?> </td>
        </tr>
        <?php
          } 
        ?>
      </table>  
    </div>
  </div>

 <div class="container menu-box">
      <div class="col-lg-12">
        <br><br>
      <h1 class="text-warning text-center" > Frisdranken</h1>
      <br>
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">
<!--           <th> Id </th> -->
          <th> Hoofdgerechten </th>
          <th> prijs </th>
        </tr>
        <?php  
        include_once "classdatabase.php";

            $pdo = new database("localhost", "restaurantex", "root", "", "utf8mb4");
            $records=$pdo->frisdranken();
            foreach($records as $res) {
        ?>
        <tr class="text-center">
 <!--          <td> <?php echo $res['id'];?> </td>  -->
          <td> <?php echo $res['naam'];?> </td>
          <td> &euro;<?php echo $res['prijs'];?> </td>
        </tr>
        <?php
          } 
        ?>
      </table>  
    </div>
  </div>

 <div class="container menu-box">
      <div class="col-lg-12">
        <br><br>
      <h1 class="text-warning text-center" > Dessert</h1>
      <br>
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">
<!--           <th> Id </th> -->
          <th> Hoofdgerechten </th>
          <th> prijs </th>
        </tr>
        <?php  
        include_once "classdatabase.php";

            $pdo = new database("localhost", "restaurantex", "root", "", "utf8mb4");
            $records=$pdo->dessert();
            foreach($records as $res) {
        ?>
        <tr class="text-center">
 <!--          <td> <?php echo $res['id'];?> </td>  -->
          <td> <?php echo $res['naam'];?> </td>
          <td> &euro;<?php echo $res['prijs'];?> </td>
        </tr>
        <?php
          } 
        ?>
      </table>  
    </div>
  </div>


 <div class="container menu-box">
      <div class="col-lg-12">
        <br><br>
      <h1 class="text-warning text-center" > Huiswijnen</h1>
      <br>
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">
<!--           <th> Id </th> -->
          <th> Hoofdgerechten </th>
          <th> prijs </th>
        </tr>
        <?php  
        include_once "classdatabase.php";

            $pdo = new database("localhost", "restaurantex", "root", "", "utf8mb4");
            $records=$pdo->huiswijnen();
            foreach($records as $res) {
        ?>
        <tr class="text-center">
 <!--          <td> <?php echo $res['id'];?> </td>  -->
          <td> <?php echo $res['naam'];?> </td>
          <td> &euro;<?php echo $res['prijs'];?> </td>
        </tr>
        <?php
          } 
        ?>
      </table>  
    </div>
  </div>


 <div class="container menu-box">
      <div class="col-lg-12">
        <br><br>
      <h1 class="text-warning text-center" > Koffie en thee</h1>
      <br>
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">
<!--           <th> Id </th> -->
          <th> Hoofdgerechten </th>
          <th> prijs </th>
        </tr>
        <?php  
        include_once "classdatabase.php";

            $pdo = new database("localhost", "restaurantex", "root", "", "utf8mb4");
            $records=$pdo->koffiethee();
            foreach($records as $res) {
        ?>
        <tr class="text-center">
 <!--          <td> <?php echo $res['id'];?> </td>  -->
          <td> <?php echo $res['naam'];?> </td>
          <td> &euro;<?php echo $res['prijs'];?> </td>
        </tr>
        <?php
          } 
        ?>
      </table>  
    </div>
  </div>


   <div class="container menu-box">
      <div class="col-lg-12">
        <br><br>
      <h1 class="text-warning text-center" > Mineraalwaters</h1>
      <br>
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">
<!--           <th> Id </th> -->
          <th> Hoofdgerechten </th>
          <th> prijs </th>
        </tr>
        <?php  
        include_once "classdatabase.php";

            $pdo = new database("localhost", "restaurantex", "root", "", "utf8mb4");
            $records=$pdo->mineraalwaters();
            foreach($records as $res) {
        ?>
        <tr class="text-center">
 <!--          <td> <?php echo $res['id'];?> </td>  -->
          <td> <?php echo $res['naam'];?> </td>
          <td> &euro;<?php echo $res['prijs'];?> </td>
        </tr>
        <?php
          } 
        ?>
      </table>  
    </div>
  </div>

   <div class="container menu-box">
      <div class="col-lg-12">
        <br><br>
      <h1 class="text-warning text-center" > Special bier</h1>
      <br>
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">
<!--           <th> Id </th> -->
          <th> Hoofdgerechten </th>
          <th> prijs </th>
        </tr>
        <?php  
        include_once "classdatabase.php";

            $pdo = new database("localhost", "restaurantex", "root", "", "utf8mb4");
            $records=$pdo->specialbier();
            foreach($records as $res) {
        ?>
        <tr class="text-center">
 <!--          <td> <?php echo $res['id'];?> </td>  -->
          <td> <?php echo $res['naam'];?> </td>
          <td> &euro;<?php echo $res['prijs'];?> </td>
        </tr>
        <?php
          } 
        ?>
      </table>  
    </div>
  </div>


   <div class="container menu-box">
      <div class="col-lg-12">
        <br><br>
      <h1 class="text-warning text-center" > Tapbier </h1>
      <br>
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">
<!--           <th> Id </th> -->
          <th> Hoofdgerechten </th>
          <th> prijs </th>
        </tr>
        <?php  
        include_once "classdatabase.php";

            $pdo = new database("localhost", "restaurantex", "root", "", "utf8mb4");
            $records=$pdo->tapbier();
            foreach($records as $res) {
        ?>
        <tr class="text-center">
 <!--          <td> <?php echo $res['id'];?> </td>  -->
          <td> <?php echo $res['naam'];?> </td>
          <td> &euro;<?php echo $res['prijs'];?> </td>
        </tr>
        <?php
          } 
        ?>
      </table>  
    </div>
  </div>

<!--   <div class="container menu-box">
      <div class="col-lg-12">
        <br><br>
      <h1 class="text-warning text-center" > Huiswijnen</h1>
      <br>
      <table class="table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">

          <th> Wijn </th>
          <th> prijs </th>
        </tr>
        <?php  
        include_once "classdatabase.php";

            $pdo = new database("localhost", "restaurantex", "root", "", "utf8mb4");
            $records=$pdo->huiswijn();
            foreach($records as $res) {
        ?>
        <tr class="text-center">
          <th class="table-dark"> <?php echo $res['naam'];?> </th>
          <th> &euro;<?php echo $res['prijs'];?> </th>
        </tr>
        <?php
          } 
        ?>
      </table>  
    </div>
   </div> -->

</body>
</html>
