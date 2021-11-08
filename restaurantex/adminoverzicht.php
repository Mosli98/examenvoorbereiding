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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="adminpage.css">
 </head>
<body>  
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <span class="navbar-toggler-icon"></span>
     <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

      <button style="margin-top: 8px; height: 36px; width: 120px; margin-left: 170px;"class="btn btn-info" 
      onclick="location.href='adminmenu.php'">Home-Menu</button>
      <button style="margin-top: 8px; height: 36px; width: 120px; margin-left: 50px;"class="btn btn-info" 
      onclick="location.href='reserveringenoverzicht.php'">Reserveringen</button>

       <div class="navbar-nav">
          <div class="dropdown" style="margin-top: 8px; margin-left: 70px; height: 42px; width: 120px;">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Gegevens
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#">Drinken</a>
              <a class="dropdown-item" href="#">Eten</a>
              <a class="dropdown-item" href="klantenoverzicht.php">Klanten</a>
              <a class="dropdown-item" href="#">Gerecht hoofdgroepen</a>
              <a class="dropdown-item" href="#">Gerecht subgroepen</a>
            </div>
          </div>
          <div class="dropdown" style="margin-top: 8px; margin-left: 50px; height: 42px; width: 120px;">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Serveren
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#">Voor kok</a>
              <a class="dropdown-item" href="#">Voor barman</a>
              <a class="dropdown-item" href="#">Voor ober</a>
            </div>
          </div>
          <button onclick="location.href='adminlogin.php';" style="margin-top: 8px; margin-left: 370px; height: 42px;" class="btn btn-primary">Logout
          </button>
       </div>
     </div>
  </nav> 
<br>
  <div class="container menu-box">
      <div class="col-lg-12">
        <br><br>
      <h1 class="text-warning text-center" > Hoofdgerechten (<a href="menuadd.php?category_id=1"><i class="fas fa-plus"></i></a>)</h1>
      <br>
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">
          <th> Naam </th>
          <th> prijs </th>
          <th> Edit </th>
          <th> Delete </th>
        </tr>
        <?php  
        include_once "classdatabase.php";

            $pdo = new database("localhost", "restaurantex", "root", "", "utf8mb4");
            $records=$pdo->gerechtsoorten();
            foreach($records as $res) {
        ?>
            <div style="display: <?php 
            if(isset($_SESSION['showAlert'])){echo $_SESSION['showAlert'];} 
                else { echo 'none'; } unset($_SESSION['showAlert']);
                ?>;" class="alert alert-success alert-dismissible mt-3">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong><?php if(isset($_SESSION['message'])){echo $_SESSION['message'];} unset($_SESSION['showAlert']); ?></strong>
            </div>        
        <tr class="text-center">
          <td> <?php echo $res['naam'];?> </td>
          <td> &euro;<?php echo $res['prijs'];?> </td>
          <td>
            <a href="menuedit.php?id=<?php echo $res['id'];?>"><i class="fas fa-edit"></i></a>
          </td>
          <td>
            <a href="menudelete.php?id=<?php echo $res['id'];?>" class="text-danger" onclick="confirm('u want to ?')"> <i class="fas fa-trash"></i></a>

          </td>
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
      <h1 class="text-warning text-center" > Voordekleinjtes (<a href="menuadd.php?category_id=2"><i class="fas fa-plus"></i></a>)</h1>
      <br>
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">
<!--           <th> Id </th> -->
          <th> Naam </th>
          <th> prijs </th>
          <th> Edit </th>
          <th> Delete </th>
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
          <td>
            <a href="menuedit.php?id=<?php echo $res['id'];?>"><i class="fas fa-edit"></i></a>
          </td>
          <td>
            <a href="menudelete.php?id=<?php echo $res['id'];?>" class="text-danger"><i class="fas fa-trash"></i></a>
          </td>
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
      <h1 class="text-warning text-center" > Voorgerechten (<a href="menuadd.php?category_id=3"><i class="fas fa-plus"></i></a>)</h1>
      <br>
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">
<!--           <th> Id </th> -->
          <th> Naam </th>
          <th> prijs </th>
          <th> Edit </th>
          <th> Delete </th>
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
          <td>
            <a href="menuedit.php?id=<?php echo $res['id'];?>"><i class="fas fa-edit"></i></a>
          </td>
          <td>
            <a href="menudelete.php?id=<?php echo $res['id'];?>" class="text-danger"><i class="fas fa-trash"></i></a>
          </td>
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
      <h1 class="text-warning text-center" > Frisdranken (<a href="menuadd.php?category_id=4"><i class="fas fa-plus"></i></a>)</h1>
      <br>
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">
<!--           <th> Id </th> -->
          <th> Naam </th>
          <th> prijs </th>
          <th> Edit </th>
          <th> Delete </th>
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
          <td>
            <a href="menuedit.php?id=<?php echo $res['id'];?>"><i class="fas fa-edit"></i></a>
          </td>
          <td>
            <a href="menudelete.php?id=<?php echo $res['id'];?>" class="text-danger"><i class="fas fa-trash"></i></a>
          </td>
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
      <h1 class="text-warning text-center" > Dessert (<a href="menuadd.php?category_id=5"><i class="fas fa-plus"></i></a>)</h1>
      <br>
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">
<!--           <th> Id </th> -->
          <th> Naam </th>
          <th> prijs </th>
          <th> Edit </th>
          <th> Delete </th>
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
          <td>
            <a href="menuedit.php?id=<?php echo $res['id'];?>"><i class="fas fa-edit"></i></a>
          </td>
          <td>
            <a href="menudelete.php?id=<?php echo $res['id'];?>" class="text-danger"><i class="fas fa-trash"></i></a>
          </td>
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
      <h1 class="text-warning text-center" > Huiswijnen (<a href="menuadd.php?category_id=6"><i class="fas fa-plus"></i></a>)</h1>
      <br>
      <table class=" table table-striped table-hover table-bordered">
        <thead>
          <tr class="bg-dark text-white text-center">
            <th> Naam </th>
            <th> prijs </th>
            <th> Edit </th>
            <th> Delete </th>
          </tr>
        </thead>
        <tbody>
        <?php  
        include_once "classdatabase.php";

            $pdo = new database("localhost", "restaurantex", "root", "", "utf8mb4");
            $records=$pdo->huiswijnen();
            foreach($records as $res) {
        ?>
        <tr class="text-center">
          <td> <?php echo $res['naam'];?> </td>
          <td> &euro;<?php echo $res['prijs'];?> </td>
          <td>
            <a href="menuedit.php?id=<?php echo $res['id'];?>"><i class="fas fa-edit"></i></a>
          </td>
          <td>
            <a href="menudelete.php?id=<?php echo $res['id'];?>" class="text-danger"><i class="fas fa-trash"></i></a>
          </td>
        </tr>
        <?php
          } 
        ?>
        </tbody>
      </table>  
    </div>
  </div>


 <div class="container menu-box">
      <div class="col-lg-12">
        <br><br>
      <h1 class="text-warning text-center" > Koffie en thee (<a href="menuadd.php?category_id=7"><i class="fas fa-plus"></i></a>)</h1>
      <br>
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">
<!--           <th> Id </th> -->
          <th> Naam </th>
          <th> prijs </th>
          <th> Edit </th>
          <th> Delete </th>
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
          <td>
            <a href="menuedit.php?id=<?php echo $res['id'];?>"><i class="fas fa-edit"></i></a>
          </td>
          <td>
            <a href="menudelete.php?id=<?php echo $res['id'];?>" class="text-danger"><i class="fas fa-trash"></i></a>
          </td>
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
      <h1 class="text-warning text-center" > Mineraalwaters (<a href="menuadd.php?category_id=8"><i class="fas fa-plus"></i></a>)</h1>
      <br>
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">
<!--           <th> Id </th> -->
          <th> Naam </th>
          <th> prijs </th>
          <th> Edit </th>
          <th> Delete </th>
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
          <td>
            <a href="menuedit.php?id=<?php echo $res['id'];?>"><i class="fas fa-edit"></i></a>
          </td>
          <td>
            <a href="menudelete.php?id=<?php echo $res['id'];?>" class="text-danger"><i class="fas fa-trash"></i></a>
          </td>
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
      <h1 class="text-warning text-center" > Special bier (<a href="menuadd.php?category_id=9"><i class="fas fa-plus"></i></a>)</h1>
      <br>
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">
<!--           <th> Id </th> -->
          <th> Naam </th>
          <th> prijs </th>
          <th> Edit </th>
          <th> Delete </th>
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
          <td>
            <a href="menuedit.php?id=<?php echo $res['id'];?>"><i class="fas fa-edit"></i></a>
          </td>
          <td>
            <a href="menudelete.php?id=<?php echo $res['id'];?>" class="text-danger"><i class="fas fa-trash"></i></a>
          </td>
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
      <h1 class="text-warning text-center" > Tapbier (<a href="menuadd.php?category_id=10"><i class="fas fa-plus"></i></a>)</h1>
      <br>
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">
<!--           <th> Id </th> -->
          <th> Naam </th>
          <th> prijs </th>
          <th> Edit </th>
          <th> Delete </th>
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
          <td>
            <a href="menuedit.php?id=<?php echo $res['id'];?>"><i class="fas fa-edit"></i></a>
          </td>
          <td>
            <a href="menudelete.php?id=<?php echo $res['id'];?>" class="text-danger"><i class="fas fa-trash"></i></a>
          </td>
        </tr>
        <?php
          } 
        ?>
      </table>  
    </div>
  </div>
</body>
</html>