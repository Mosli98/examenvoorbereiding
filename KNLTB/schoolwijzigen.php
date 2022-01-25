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
            $scholenid = $_POST['scholenid'];
            $schoolnaam = $_POST['schoolnaam'];
                    
            $sql = "UPDATE scholen SET schoolnaam=:schoolnaam WHERE scholenid=:scholenid";
            $query = $dbConn->prepare($sql);
            
            $query->bindparam(':scholenid', $scholenid);
            $query->bindparam(':schoolnaam', $schoolnaam);
            $query->execute();

            header("location:scholen.php");
        }
    ?>
    <?php
        $scholenid = $_GET['scholenid'];
        $sql = "SELECT * FROM scholen WHERE scholenid=:scholenid";
        $query = $dbConn->prepare($sql);
        $query->execute(array(':scholenid' => $scholenid));

        while($row = $query->fetch(PDO::FETCH_ASSOC))
        {
            $schoolnaam = $row['schoolnaam'];
        }
    ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12">
                <form class="form-horizontal" role="form" method="post" action="schoolwijzigen.php">
                    <div class="form-group">
                        <label for="vak" class="col-sm-2 control-label">schoolnaam</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="schoolnaam" name="schoolnaam" value="<?php echo $schoolnaam;?>" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2 ">
                            <input type="hidden" name="scholenid" value=<?php echo $_GET['scholenid'];?>>
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
