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
    <?php
        if(isset($_POST['update'])) {	
            $spelersid = $_POST['spelersid'];
            $voornaam = $_POST['voornaam'];
            $tussenvoegsel = $_POST['tussenvoegsel'];
            $achternaam = $_POST['achternaam'];
                    
            $sql = "UPDATE spelers SET voornaam=:voornaam, tussenvoegsel=:tussenvoegsel, achternaam=:achternaam WHERE spelersid=:spelersid";
            $query = $dbConn->prepare($sql);
            
            $query->bindparam(':spelersid', $spelersid);
            $query->bindparam(':voornaam', $voornaam);
            $query->bindparam(':tussenvoegsel', $tussenvoegsel);
            $query->bindparam(':achternaam', $achternaam);
            $query->execute();

            header("location:spelers.php");
        }
    ?>
    <?php
        $spelersid = $_GET['spelersid'];
        $sql = "SELECT * FROM spelers WHERE spelersid=:spelersid";
        $query = $dbConn->prepare($sql);
        $query->execute(array(':spelersid' => $spelersid));

        while($row = $query->fetch(PDO::FETCH_ASSOC))
        {
            $voornaam = $row['voornaam'];
            $tussenvoegsel = $row['tussenvoegsel'];
            $achternaam = $row['achternaam'];
        }
    ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12">
                <form class="form-horizontal" role="form" method="post" action="spelerwijzigen.php">
                    <div class="form-group">
                        <label for="vak" class="col-sm-2 control-label">Voornaam</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="voornaam" name="voornaam" value="<?php echo $voornaam;?>" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="vak" class="col-sm-2 control-label">Tussenvoegsel</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="tussenvoegsel" name="tussenvoegsel" value="<?php echo $tussenvoegsel;?>" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="vak" class="col-sm-2 control-label">Achternaam</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="achternaam" name="achternaam" value="<?php echo $achternaam;?>" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2 ">
                            <input type="hidden" name="spelersid" value=<?php echo $_GET['spelersid'];?>>
                            <input id="update" name="update" type="submit" value="Verstuur" class="btn btn-primary">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <! Will be used to display an alert to the user>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>