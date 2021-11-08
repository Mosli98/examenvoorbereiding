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
          <img src="images/pn11.jpg" style="width:45%; float:center;height: 280px;" >
          <img src="images/pn11.webp" style="width:40%; float:center; height: 280px;">
        </div>  
    </div>
  <div class style="margin-top: 200px;">    
      <div class="col-lg-12">
        <br><br>
      <br>
      <form action="succesmetbestellen.php" method="POST"><!--     succesmetroomservice.php     -->
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">
          <th> Gerechten </th>
          <th> Aantal </th>
          <th> Submit </th>
        </tr>
    
        <tr class="text-center">
          <h1 class ="text-warning text-center" > Gerechten </h1>
          <!-- <td> <input type="text" id="naam" name="naam" placeholder="naam.." required ></td> -->
        <?php if($error) { ?>
          <p style="background-color: red; color: #fff; text-align: center;"><?php echo $error; ?></p>
        <?php } ?>
          <td> 
            <input type="hidden" name="reservatie_id" value="<?php echo $reservatie_id; ?>">
            <select name="gerechten" id="cars">
              <option value="">None</option>
              <?php 
                  $pdo = new database("localhost", "restaurantex", "root", "", "utf8mb4");
                  $gerechten=$pdo->oproepgerechten();

                  foreach($gerechten as $res) {
              ?>
                <option name="naam" value=""><?php echo $res['naam']; ?> ($<?php echo number_format($res['prijs']); ?>)</option>
              <?php
                } 
              ?>
            <td>
              <input name="aantal" type="num" placeholder="aantal.."> 
            </td>
            <td> <input name="pieter" type="submit" value="Bestellen!"> </td>
            </select>
          </td>
<!--           <td> 
            <select name="eten" id="cars">
              <option value="">None</option>
              <?php 
                  $eten=$pdo->eten();
                  foreach($eten as $res) {
              ?>
                <option value="<?php echo $res['id']; ?>"><?php echo $res['naam']; ?> ($<?php echo number_format($res['prijs']); ?>)</option>
              <?php
                } 
              ?>
            </select>
          </td> -->
          
        </tr>       
      </table>
      </form>
         
    </div>
  </div> 
  
</body>
</html>
