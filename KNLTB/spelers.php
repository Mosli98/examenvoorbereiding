<?php
    include_once("connectie.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>KNLTB</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        include_once("navbar.php");
    ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12">
                <a href="spelertoevoegen.php" class="btn btn-success">Toevoegen</a>
                <table class="table table-striped table-bordered mt-2">
					<thead>
					<tr>
						<td>Spelers Id</td>
						<td>Voornaam</td>
						<td>Tussenvoegsel</td>
						<td>Achternaam</td>
						<td>School Id</td>
					</tr>
					</thead>
					<tbody>
					<?php
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $sql = 'SELECT * FROM spelers ORDER BY spelersid DESC';
                        
                        foreach ($conn->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['spelersid'] . '</td>';
                            echo '<td>'. $row['voornaam'] . '</td>';
                            echo '<td>'. $row['tussenvoegsel'] . '</td>';
                            echo '<td>'. $row['achternaam'] . '</td>';
                            echo '<td>'. $row['scholenid'] . '</td>';
                            echo '<td width=250>';
                            echo '<a class="btn btn-success" href="spelerwijzigen.php?spelersid='.$row['spelersid'].'">Wijzigen</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="spelerverwijderen.php?spelersid='.$row['spelersid'].'">Verwijderen</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        $conn = null;
					?>
					</tbody>
				</table>
            </div>
        </div>
    </div>
</body>
</html>
