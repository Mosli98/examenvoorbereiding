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

          <button onclick="location.href='loginwaiter.php';" style="margin-top: 8px; margin-left: 1700px; height: 42px;" class="btn btn-primary">Logout
          </button>
       </div>
     </div>
  </nav> 
<br>

   <div class="container ">
      <div class="col-lg-12">
        <br><br>
      <h1 class="text-warning text-center" > Ober overzicht</h1>
      <br>
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">
          <th> Tafel </th>
          <th> Datum </th>
          <th> Tijd </th>
          <th> Klant </th>
          <th> Allergieen </th>
          <th> Opmerkingen </th>
          <th> Edit </th>
          <th> Delete </th>
          <th> Serveer </th>
        </tr>
        <?php  
        include_once "classdatabase.php";

            $pdo = new database("localhost", "restaurantex", "root", "", "utf8mb4");
            $records=$pdo->reserveringAll();
            foreach($records as $res) {
        ?>
        <tr class="text-center">
          <td> <?php echo $res['tafel'];?> </td>
          <td> <?php echo $res['datum'];?> </td>
          <td> <?php echo $res['tijd'];?> </td>
          <td> <?php echo $res['naam'];?> </td>
          <td> <?php echo $res['allergieen'];?> </td>
          <td> <?php echo $res['opmerkingen'];?> </td>        

          <td>
            <a href="obercanedit.php?id=<?php echo $res['id'];?>"><i class="fas fa-edit"></i></a>
          </td>
          <td>
            <a href="obercandelete.php?id=<?php echo $res['id'];?>" class="text-danger"><i class="fas fa-trash"></i></a>
          </td>

          <td>
            <a href="#.php?id=<?php echo $res['id'];?>"> Serveer<i class=""></i></a>
          </td>            
        </tr>
        <?php
          } 
        ?>
      </table>  
    </div>

  </div>
  <div class="container">
      <div class="col-lg-12">
        <br><br>
      <h1 class="text-warning text-center" > Reservatie toevoegen </h1>
      <br>
      <form action="obercanadd.php" method="POST">
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">

          <th> Tafel </th>
          <th> Datum </th>
          <th> Tijd </th>
          <th> Klant </th>
          <th> Allergieen </th>
          <th> Opmerkingen </th>
          <th> Toevoegen </th>
        </tr>

        <tr class="text-center">
          <td> <input type="text" id="tafel" name="tafel"required ></td>
          <td> <input type="text" id="datum" name="datum" required></td>
          <td> <input type="text" id="tijd" name="tijd" required></td>
          <td> <input type="text" id="klant" name="klant" required></td>
          <td> <input type="text" id="allergieen" name="allergieen" required></td>
          <td> <input type="text" id="opmerkingen " name="opmerkingen " required></td>
                 
          <td> <input type="submit" class="btn-white" name="petergriffin" value="Add"></td>
          <?php  
          if (isset($_POST['petergriffin'])){
          echo ' <script type = > swal("Good job!", "You added a customer!", "success") <script/>';
          }
          ?>

        </tr>

      </table>
      </form>   
    </div>

  <div class="container">
      <div class="col-lg-12">
        <br><br>
      <h1 class="text-warning text-center" > Bestellingen</h1>
      <br>
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">
          <th> code </th>
          <th> naam </th>
          <th> geserveerd </th>
        </tr>
        <?php  
        include_once "classdatabase.php";

            $pdo = new database("localhost", "restaurantex", "root", "", "utf8mb4");
            $records=$pdo->kokbestellingoverzicht();
            foreach($records as $res) {
        ?>
        <tr class="text-center">
          <td> <?php echo $res['id'];?> </td>
          <td> <?php echo $res['code'];?> </td>
          <td> <?php echo $res['naam'];?> </td>
          <td> <?php echo $res['geserveerd'];?> </td>
          <td> <button class="btn-danger"> <a href="deletekok.php?id= <?php echo $res['id']; ?>" class ="text-white">  Delete </a> </button> </td>
          <td> <button class="btn-white"> <a href="updatekok.php?id=<?php echo $res['id']; ?>" calss="text-danger"> Update </a> </button> </td>
        </tr>
        <?php
          } 
        ?>
      </table>  
    </div>
  </div>    
  </div>  

<br>
</body>
</html>

