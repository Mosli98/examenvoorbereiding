<?php  
include "classdatabase.php";
$id = $_GET['id'];
$pdo = new database("localhost", "restaurantex", "root", "", "utf8mb4");

if(isset($_POST['submit'])){

	$id = $_POST["id"];
	$naam = $_POST['naam'];
    $code = $_POST['code'];
    $prijs = $_POST['prijs'];

    //echo "Calling login<br>";
    //die("Post ID: $id");
    
    $pdo->updatemenu($id, $naam, $code, $prijs);
    header('location:adminmenu.php');
}	

$records= $pdo->selectmenu($id);
$naam=$records["naam"];
$code=$records["code"];
$prijs=$records["prijs"];

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

				<label><font color="blue">Naam:</font></label>
				<input type="text" name="naam" class="form-control" placeholder="naam" value="<?php echo $naam; ?>"> <br>

				<label><font color="blue">Code:</font></label>
				<input type="text" name="code" class="form-control" placeholder="code" value="<?php echo $code; ?>" maxlength="4"> <br>

				<label><font color="blue"> Prijs:</font> </label>
				<input type="text" name="prijs" class="form-control" placeholder="prijs" value="<?php echo $prijs; ?>"> <br>
				
				<input type="hidden" name="id" value="<?php echo $id; ?>">

				<button class="btn btn-success" type="sumbit" name="submit"> Wijzig gegevens </button>
			</div>
		</form>
	</div>
</body>
</html>