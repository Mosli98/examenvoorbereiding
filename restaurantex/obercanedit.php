<?php  
include "classdatabase.php";
$id = $_GET['id'];
$pdo = new database("localhost", "restaurantex", "root", "", "utf8mb4");

if(isset($_POST['submit'])){

	$id = $_POST["id"];
	$tafel=$records["tafel"];
	$datum=$records["datum"];
	$tijd=$records["tijd"];
	$klant=$records["klant"];
	$allergieen=$records["allergieen"];
	$opmerkingen=$records["opmerkingen"];

    //echo "Calling login<br>";
    //die("Post ID: $id");
    
    $pdo->obercanupdate($tafel, $datum, $tijd, $klant, $allergieen, $opmerkingen);
    header('location:waiteroverzicht.php');
}	

$records= $pdo->obercanselect($id);
$tafel=$records["tafel"];
$datum=$records["datum"];
$tijd=$records["tijd"];
$klant=$records["klant_id"];
$allergieen=$records["allergieen"];
$opmerkingen=$records["opmerkingen"];
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
					<h1 class="text-white"> Update medewerker</h1>
				</div>

				<label><font color="blue">tafel:</font></label>
				<input type="text" name="tafel" class="form-control" placeholder="tafel" value="<?php echo $tafel; ?>"> <br>

				<label><font color="blue">datum:</font></label>
				<input type="text" name="datum" class="form-control" placeholder="datum" value="<?php echo $datum; ?>" maxlength="4"> <br>

				<label><font color="blue"> tijd:</font> </label>
				<input type="text" name="tijd" class="form-control" placeholder="tijd" value="<?php echo $tijd; ?>"> <br>

				<label><font color="blue"> klant:</font> </label>
				<input type="text" name="klant" class="form-control" placeholder="klant" value="<?php echo $klant; ?>"> <br>
				
				<label><font color="blue"> allergieen:</font> </label>
				<input type="text" name="allergieen" class="form-control" placeholder="allergieen" value="<?php echo $allergieen; ?>"> <br>

				
				<label><font color="blue"> opmerkingen:</font> </label>
				<input type="text" name="opmerkingen" class="form-control" placeholder="opmerkingen" value="<?php echo $opmerkingen; ?>"> <br>				

				<input type="hidden" name="id" value="<?php echo $id; ?>">

				<button class="btn btn-success" type="sumbit" name="submit"> Wijzig gegevens </button>
			</div>
		</form>
	</div>
</body>
</html>

