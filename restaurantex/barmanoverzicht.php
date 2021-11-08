<?php 
session_start();
include 'classdatabase.php';

// var_dump($_POST);

if(isset($_POST['submit'])){
// instance van je database class

}
?>

<!DOCTYPE html>
<html>
 <head>
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="adminpage.css">
 </head>
<body>  
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <span class="navbar-toggler-icon"></span>
     <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

      <button style="margin-top: 8px; height: 42px; width: 120px; margin-left: 170px;"class="btn btn-primary" type="submit">Home-Menu</button>
      <button style="margin-top: 8px; height: 42px; width: 120px; margin-left: 50px;"class="btn btn-primary" type="submit">Reserveringen</button>

       <div class="navbar-nav">
          <div class="dropdown" style="margin-top: 8px; margin-left: 70px; height: 42px; width: 120px;">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Gegevens
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#">Drinken</a>
              <a class="dropdown-item" href="#">Eten</a>
              <a class="dropdown-item" href="klantenoverzicht.php">Klanten</a>
              <a class="dropdown-item" href="gerechthoofdgroep.php">Gerecht hoofdgroepen</a>
              <a class="dropdown-item" href="subgerecht.php">Gerecht subgroepen</a>
            </div>
          </div>
          <div class="dropdown" style="margin-top: 8px; margin-left: 50px; height: 42px; width: 120px;">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Serveren
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="adminoverzichtkok.php">Voor kok</a>
              <a class="dropdown-item" href="adminoverzichtbarman.php">Voor barman</a>
              <a class="dropdown-item" href="adminoverzichtober.php">Voor ober</a>
            </div>
          </div>
          <a href="adminlogin.php">
          <button style="margin-left: 950px;" class="btn btn-primary" type="submit">Logout</button>
          </a>
       </div>
     </div>
  </nav> 
<br>
  <div class="container">
      <div class="col-lg-12">
        <br><br>
      <h1 class="text-warning text-center" > Klanten Overzicht</h1>
      <br>
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">
          <th> id </th>
          <th> naam </th>
          <th> telefoon </th>
          <th> email </th>
          <th> Delete user </th>
          <th> Eddit user </th>
        </tr>
        <?php  
        include_once "classdatabase.php";

            $pdo = new database("localhost", "restaurantex", "root", "", "utf8mb4");
            $records=$pdo->registerAll();
            foreach($records as $res) {
        ?>
        <tr class="text-center">
          <td> <?php echo $res['id'];?> </td>
          <td> <?php echo $res['naam'];?> </td>
          <td> <?php echo $res['telefoon'];?> </td>
          <td> <?php echo $res['email'];?> </td>
          <td> <button class="btn-danger"> <a href="deletereserveringbar.php?id=<?php echo $res['id']; ?>&klant_id=<?php echo $res['naam_id'];?>" class ="text-white">  Delete </a> </button> </td>
          <td> <button class="btn-white"> <a href="reserveringupdate.php?id=<?php echo $res['id']; ?>" calss="text-danger"> Update </a> </button> </td>
        </tr>
        <?php
          } 
        ?>
      </table>  
    </div>
  </div>
<br>
  <div class="container">
      <div class="col-lg-12">
        <br><br>
      <h1 class="text-warning text-center" > Reservering toevoegen </h1>
      <br>
      <form action="reserveringadd.php" method="POST">
      <table class="table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">

          <th> naam </th>
          <th> kamernummer </th>
          <th> Add klantkamer </th>
        </tr>
        <?php  
        include_once "classdatabase.php";

            $pdo = new database("localhost", "restaurantex", "root", "", "utf8mb4");
            // $records=$pdo->jongeren();
            // foreach($records as $res) 
            {
        ?>
        <tr class="text-center">
          <td> <input type="text" id="naam" name="naam" required></td>
          <td> <input type="text" id="kamernummer" name="kamernummer" required></td>
          <td> <input type="submit" class="btn-white" value="Add" required> </td>
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