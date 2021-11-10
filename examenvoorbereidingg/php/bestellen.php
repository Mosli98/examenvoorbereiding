<?php

include 'database.php';

$conn = mysqli_connect("localhost", "root", "", "excellenttaste");

$sql2 = "SELECT tijd FROM reserveringen";

$conn2 = mysqli_connect("localhost", "root", "", "excellenttaste");

$result2 = mysqli_query($conn2, $sql2);
$resultCheck2 = mysqli_num_rows($result2);
$tijden = [];

if ($resultCheck2 > 0) {
    while ($row = mysqli_fetch_assoc($result2)) {
        array_push($tijden, $row['tijd']);
    }
}

$sql = "SELECT naam FROM menuitems";

$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
$namen = [];

if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($namen, $row['naam']);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) && !empty($_POST['submit'])) {
    $naam = trim(strtolower($_POST['naam']));
    $tijd = trim(strtolower($_POST['tijden']));
    $aantal = trim(strtolower($_POST['aantal']));

    if(isset($_POST['gereserveerd'])) {
        $gereserveerd = 1;
    } else $gereserveerd = 0;

    $uCode = mb_substr(uniqid(), 8, 13);

    $db = new database('localhost', 'root', '', 'excellenttaste', 'utf8');

    $sql2 = "SELECT reserveringcode FROM reserveringen WHERE tijd = :tijd";

    $named_placeholder2 = [
        'tijd'=>$tijd,
    ];

    $reserveringcode = $db->select($sql2, $named_placeholder2);

    $sql3 = "SELECT menuitemscode FROM menuitems WHERE naam = :naam";

    $named_placeholder3 = [
        'naam'=>$naam,
    ];

    $menuitemscode = $db->select($sql3, $named_placeholder3);

    $sql = "INSERT INTO bestellingen VALUES (:bestellingscode, :reserveringcode, :menuitemscode, :aantal, :gereserveerd)";

        $named_placeholder = [
            'bestellingscode'=>$uCode,
            'reserveringcode'=>$reserveringcode[0]['reserveringcode'], 
            'menuitemscode'=>$menuitemscode[0]['menuitemscode'],
            'aantal'=>$aantal,
            'gereserveerd'=>$gereserveerd,
        ];

        $db->insert($sql, $named_placeholder, 'bestellen.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit3']) && !empty($_POST['submit3'])) {

    $db = new database('localhost', 'root', '', 'excellenttaste', 'utf8');

    $sql = "DELETE FROM bestellingen WHERE naam =:naam";

    $naam3 = trim(strtolower($_POST['naam3']));

    $named_placeholder = [
        'naam'=>$naam3,
    ];

$db->edit_or_delete($sql, $named_placeholder, 'bestellen.php');

}
?>

<html lang="en">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Bestellen</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <script src="../script.js"></script>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="./index.php">Excellent Taste</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       Serveren
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="koklijst.php">Voor kok</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="barmanlijst.php">Voor barman</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="oberlijst.php">Voor ober</a>
        </div>
      <li class="nav-item">
        <a class="nav-link" href="reserveren.php">Reserveringen</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="bestellen.php">Bestellingen</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Gegevens
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="klant.php">Klant</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="drank.php">Drinken</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="eten.php">Eten</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="hoofdgroep.php">Hoofdgroepen</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="subgroepen.php">Subgroepen</a>
        </div>
    </ul>
  </div>
</nav>
<body>
            <form action="bestellen.php" method="post" style="margin: 9rem 0 0 30%;border: 1px solid black; width: 430px; text-align: center; height: 600px">           
                <h1>Voeg bestelling toe</h1><br>
                <label for="tijden">Kies de tijd van reservering</label> <br>
                <select id="tijden" name="tijden">
                    <?php
                    foreach ($tijden as $item) {
                        echo "<option value='$item'>$item</option>";
                    } ?>
                </select> <br><br>
                <label for="namen">Kies menuitem</label> <br>
                <select id="namen" name="naam">
                    <?php
                    foreach ($namen as $item) {
                        echo "<option value='$item'>$item</option>";
                    } ?>
                </select> <br><br>
                <label for="aantal">aantal</label><br>
                <input id="aantal" type="text" name="aantal" required /><br><br>
                <label for="gereserveerd">gereserveerd</label><br>
                <input id="gereserveerd" type="checkbox" name="gereserveerd" /><br><br>
                <input type="submit" name="submit" value="toevoegen"/>
                <a style="margin: 30px 0 0 30px" id="" value="submit" href="./welcome.php">terug</a><br>
            </form>
            
            <script type="text/javascript" src="../script.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
</body>
</html>