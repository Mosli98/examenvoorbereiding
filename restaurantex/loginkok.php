<?php
session_start();
include 'classdatabase.php';

// var_dump($_POST);

if(isset($_POST['submit'])){

$fieldnames = array("username", "password");

$error = false;

  foreach ($fieldnames as $fieldname) {
      if (!isset($_POST[$fieldname]) || empty($_POST[$fieldname])){
       $error = true;
    }
  }
  if ($error = true) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $pdo = new database("localhost", "restaurantex", "root", "", "utf8mb4");
    $pdo->loginkok($username, $password);
    echo '<hr>';
  }
  // else{
  //   echo "Not working";
  //  }
 }
?>

<!DOCTYPE html>
<html>
  <head>
  <title></title>
    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href='https://fonts.googleapis.com/css?family=Acme' rel='stylesheet'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>
<body style="background: #0C3F79;">
  <?php 
  if(isset($message))
  {
    echo '<label class="text-danger">'.$message.'</label>';
  }
  ?> 
   <header>
     <div class="container center-div shadow">
      <div style="font-size: 25px;" class="heading text-center mb-5 text-white"> KOK LOGIN PAGE </div>
      <div class="container row d-flex flex-row justify-content-center mb-5">
          <div class="admin-form shadow p-2">
              <form style="width: 410px" action="loginkok.php" method="POST">
                <div class="form-group">
                  <div>
                  </div>
                <label  style="color: #FFFFFF;" >Username</label>
                 <input type="username" name="username" class="form-control" placeholder="Username.." required>
                </div>
                <div class="form-group">
                <label style="color: #FFFFFF;">Password</label>
                 <input type="password" name="password" class="form-control" placeholder="Password.." required>
                </div>
                <input type="submit" class="btn btn-success"  value="submit" name="submit">
              </form>
          </div>  
      </div>     
      </div>
     </div>
   </header>
</body>
</html>