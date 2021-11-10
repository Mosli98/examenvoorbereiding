<?php

include 'database.php';

$conn = mysqli_connect("localhost", "root", "", "excellenttaste");

$table = "<table><tr><th>subgroepen</th></tr>";
$result = $conn->query("SELECT naam FROM `gerechtsoorten` WHERE 1");
while ($row = $result->fetch_assoc())
{
    $table .= "<tr>";
    $table .= "<td>{$row['naam']}</td>";

    $table .= "</tr>";
}

$table .= "</table";


$sql = "SELECT naam FROM gerechtsoorten";

$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
$namen = [];

if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($namen, $row['naam']);
    }
}

$sql2 = "SELECT naam FROM gerechtcategorien";

$conn2 = mysqli_connect("localhost", "root", "", "excellenttaste");

$result2 = mysqli_query($conn2, $sql2);
$resultCheck2 = mysqli_num_rows($result2);
$product = [];

if ($resultCheck2 > 0) {
    while ($row = mysqli_fetch_assoc($result2)) {
        array_push($product, $row['naam']);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) && !empty($_POST['submit'])) {
    $naam = trim(strtolower($_POST['naam']));
    $hoofdcatogorie = trim(strtolower($_POST['hoofdcatogorie']));
 

    $uCode = mb_substr(uniqid(), 8, 13);
    $uCode2 = mb_substr(uniqid(), 10, 13);

    $db = new database('localhost', 'root', '', 'excellenttaste', 'utf8');

    $sql2 = "SELECT gerechtcategoriencode FROM gerechtcategorien WHERE naam = :naam";

    $named_placeholder2 = [
        'naam'=>$hoofdcatogorie,
    ];

    $gerechtcategoriencode = $db->select($sql2, $named_placeholder2);

    $sql = "INSERT INTO gerechtsoorten VALUES (:gerechtsoortencode, :gerechtcategoriencode, :code, :naam)";

        $named_placeholder = [
            'gerechtsoortencode'=>$uCode,
            'gerechtcategoriencode'=>$gerechtcategoriencode[0]['gerechtcategoriencode'], 
            'code'=>$uCode2,
            'naam'=>$naam,
        ];

        $db->insert($sql, $named_placeholder, 'subgroepen.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit2']) && !empty($_POST['submit2'])) {


    $db = new database('localhost', 'root', '', 'excellenttaste', 'utf8');


    $sql = "UPDATE gerechtsoorten SET naam=:naam WHERE naam =:naam2;";

    $naam = trim(strtolower($_POST['naam']));
    $naam2 = trim(strtolower($_POST['subcatogorie']));

    $named_placeholder = [
        'naam'=>$naam,
        'naam2'=>$naam2,
    ];

$db->edit_or_delete($sql, $named_placeholder, 'subgroepen.php');

}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit3']) && !empty($_POST['submit3'])) {

    $db = new database('localhost', 'root', '', 'excellenttaste', 'utf8');

    $sql = "DELETE FROM gerechtsoorten WHERE naam =:naam";

    $naam3 = trim(strtolower($_POST['naam3']));

    $named_placeholder = [
        'naam'=>$naam3,
    ];

$db->edit_or_delete($sql, $named_placeholder, 'subgroepen.php');

}
?>

<html lang="en">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Subgroepen</title>
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
            <form action="subgroepen.php" method="post" style="margin: 0 0 3rem 0;border: 1px solid black; width: 430px; text-align: center; height: 360px">           
                <h1>Voeg subcatogorie toe</h1><br>
                <label for="naam">naam</label><br>
                <input id="naam" type="text" name="naam" required /><br><br>

                <label for="hoofdcatogorie">Kies hoofdcatogorie</label> <br>
                <select id="hoofdcatogorie" name="hoofdcatogorie">
                    <?php
                    foreach ($product as $item) {
                        echo "<option value='$item'>$item</option>";
                    } ?>
                </select> <br><br>
 
                <input id="button" type="submit" name="submit" value="toevoegen"/>
                <button style="margin: 30px 0 0 30px" id="" value="submit" onclick="goMenu()">terug</button><br>
            </form>



            <form action="subgroepen.php" method="post" style="border: 1px solid black; width: 300px; text-align: center; height: 390px; float: right;">           
            <h1>Wijzig subcatogorie</h1><br>
                <label for="subcatogorie">Kies welke subcatogorie je wilt wijzigen:</label> <br>
                <select id="subcatogorie" name="subcatogorie">
                    <?php
                    foreach ($namen as $item) {
                        echo "<option value='$item'>$item</option>";
                    } ?>
                </select> <br><br>
                <label for="naam2">nieuwe naam</label><br>
                <input id="naam2" type="text" name="naam" required /><br><br>
                <input id="button" type="submit" name="submit2" value="wijzigen"/>
                <button style="margin: 30px 0 0 30px" id="" value="submit" onclick="goMenu()">terug</button><br>
            </form>

            <form action="subgroepen.php" method="post" style="border: 1px solid black; width: 300px; text-align: center; height: 240px; float: right; position: fixed; margin: 0 0 0 50rem;">           
                <h1>Verwijderen</h1><br>
                <label for="naam3">Kies welke klant je wilt verwijderen:</label> <br>
                <select id="naam3" name="naam3">
                    <?php
                    foreach ($namen as $item) {
                        echo "<option value='$item'>$item</option>";
                    } ?>
                </select> <br><br>
          
                <input id="button" type="submit" name="submit3" value="Verwijderen"/>
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
<style>
table {
    margin: 6rem 0 0 5%;
    width: 36%;
}
</style>
</html>

<?php 
print $table;
?>