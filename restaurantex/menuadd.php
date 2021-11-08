<?php  
include "classdatabase.php";
$category_id = $_GET['category_id'];
$pdo = new database("localhost", "restaurantex", "root", "", "utf8mb4");

if(isset($_POST['submit'])){

	$category_id = $_POST["category_id"];
	$naam = $_POST['naam'];
    $code = $_POST['code'];
    $prijs = $_POST['prijs'];

    //echo "Calling login<br>";
    //die("Post ID: $id");
    
    $pdo->addmenu($category_id, $naam, $code, $prijs);
    header('location:adminmenu.php');
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
</head>
<body>
	<div class="col-lg-6 m-auto">
		<form method="POST" action="">
			<br><br><div class="card" style="color: #FFF;">
				<div class="card-header bg-dark">
					<h1 class="text-white"> Add menu</h1>
				</div>

				<label><font color="blue">Naam:</font></label>
				<input type="text" name="naam" class="form-control" placeholder="naam" value=""> <br>

				<label><font color="blue">Code:</font></label>
				<input type="text" name="code" class="form-control" placeholder="code" value="" maxlength="4"> <br>

				<label><font color="blue"> Prijs:</font> </label>
				<input type="text" name="prijs" class="form-control" placeholder="prijs" value=""> <br>
				
				<input type="hidden" name="category_id" value="<?php echo $category_id; ?>">

				<button class="btn btn-success" type="sumbit" name="submit"> Add </button>
			</div>
		</form>
	</div>
</body>
</html>