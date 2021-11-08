<?php
session_start();
include "classdatabase.php";
          // $_SESSION['counter'] = 20;

$pdo = new database("localhost", "restaurantex", "root", "", "utf8mb4");
$_SESSION['error'] = '';
$error = $_SESSION['error'] ?? '';
$_SESSION['error'] = '';

$reservatie_id = $_SESSION['reservatie_id'] ?? '';
$klant = $_GET['klant'] ?? '';
$klant_id = $_GET['klant_id'] ?? '';
$reorder = $_GET['reorder'] ?? '';


if($reservatie_id) {
  header("Location: roomservice.php?reservatie_id=$reservatie_id&reorder=$reorder");
  exit;
}


if(isset($_POST['submit'])){
// instance van je database class

// $fieldnames = array("username", "password");

// $error = false;

//   foreach ($fieldnames as $fieldname) {
//     if (isset($_POST[$fieldname]) || empty($_POST[$fieldname])) {
//        $error = true;
//     }
//     if(!empty($_POST[$fieldnames])){
//     echo "<br> Plz fill the required fields in!";
//   }
//   }
//    if (!$error) {
//     $username = $_POST['username'];
//     $password = $_POST['password'];

//     $pdo = new database("localhost", "examenoefen", "root", "", "utf8mb4");
//     $pdo->InsertTabellen($username, $password);
//     echo '<hr>';
//    }  
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
      <li class="logo">Restaurant Tuin</li>
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
  </div>
 
  <div class style="margin-top: 200px;">    
      <div class="col-lg-12">
        <br><br>

      <br>

<!-- <form style="margin-top: 200px; color: #fff;" method='post'>
  <h3>Aantal kamers: <?= $_SESSION['counter'] ?> </h3>
  <input name='reserve' type="submit" value='Reserveer'>
</form> -->


<!-- <form style="margin-top: 200px; color: #FFF;" method='post'>
  <h3>Aantal kamers: <?= $_SESSION['counter'] ?> </h3>
  <input name='reserve' type="submit" value='Reserveer'>
</form> -->



      <form action="succesmetkiezen.php" method="POST">        
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">
          <!-- <th> naam </th> -->
          <th> Tables </th>
          <th> Aantal gasten </th>
          <th> Submit </th>

        </tr>
        <?php  
        include_once "classdatabase.php";

            $pdo = new database("localhost", "restaurantex", "root", "", "utf8mb4");
            // $records=$pdo->jongeren();
            // foreach($records as $res) 
            {

        if (!isset($_SESSION['counter'])) {
          $_SESSION['counter'] = 20;
        }

        if (isset($_SESSION['counter'])) {
          // $_SESSION['counter']++;
        }              
        ?>      
        <?php if($error) { ?>
          <p style="background-color: red; color: #fff; text-align: center;"><?php echo $error; ?></p>
        <?php } ?>
        <tr class="text-center">
          <h1 class ="text-warning text-left" > Reservering</h1>
          <!-- <td> <input type="text" id="naam" name="naam" placeholder="naam.." required ></td> -->
          <td>
          <table>

            <td> 
            <input type="date" id="datum" min="<?php echo date('Y-m-d'); ?>" name="datum" placeholder="datum.." required>
            </td>
           
            <td>
              <input type="time" id="tijd" name="tijd" placeholder="tijd.." required>

            </td>
            <td> <input type="text" id="allergieen" name="allergieen" placeholder="allergieen.." required>
            </td>  
            
          </table>           
            <select name="tafelnummer" id="cars" required>
              <option value="">None</option>
            <?php 
                $pdo = new database("localhost", "restaurantex", "root", "", "utf8mb4");
                $records=$pdo->tafels();
                for($i = 0; $i < (int)$_SESSION['counter']; $i++) {
                  $res = $records[$i];
            ?>
              <option value="<?php echo $res['id']; ?>"><?php echo $res['naam']; ?> <!-- ($<?php echo number_format($res['prijs']); ?>) --></option>
            <?php
              } 
            ?>
            </select>
          </td>

            <td>
              <input name="aantal_k" type="num" placeholder="gastenaantal.."> 
            </td>

          <td> 
          <input type="hidden" name="klant" value="<?php echo $_GET['klant'] ?? '' ?>"> 
          <input type="hidden" name="klant_id" value="<?php echo $_GET['klant_id'] ?? '' ?>">
          <input name="pieter" type="submit" value="Request!"> 
          </td>
          <h3 style="color: #FFF;">Amount of tables free: <?= $_SESSION['counter'] ?> </h3>
            <label for="cars"></label>
        </tr>       
        <?php
          } 
        ?>
      </table>
      </form>
         
    </div>
  </div> 
  
</body>
</html>
