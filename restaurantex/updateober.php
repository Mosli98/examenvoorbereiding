<?php  
include "classdatabase.php";
$id = $_GET['id'];
$pdo = new database("localhost", "restaurantex", "root", "", "utf8mb4");

if(isset($_POST['submit'])){

	$id = $_POST["id"];
	$username = $_POST['username'];
	$password = $_POST['password'];

    //echo "Calling login<br>";
    //die("Post ID: $id");
    
    $pdo->oberupdate($id, $username, $password);
    header('location:adminoverzichtober.php');
}	

$records= $pdo->selectober($id);
$username=$records["username"];
$password=$records["password"];
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
</head>
<body>
	<div class="col-lg-6 m-auto">
		<form method="POST" action="">
			<br><br><div class="card" style="color: #FFF;">
				<div class="card-header bg-dark">
					<h1 class="text-white"> Update ober</h1>
				</div>

				<label><font color="blue">username:</font></label>
				<input type="text" name="username" class="form-control" placeholder="username" value="<?php echo $username; ?>"> <br>
				
				<label><font color="blue">password:</font></label>
				<input type="text" name="password" class="form-control" placeholder="password" value="<?php echo $password; ?>"> <br>


				<input type="hidden" name="id" value="<?php echo $id; ?>">

				<button class="btn btn-success" type="sumbit" name="submit"> Wijzig gegevens </button>
			</div>
		</form>
	</div>
</body>
</html>