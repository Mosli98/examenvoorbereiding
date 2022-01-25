<?php
    include("connectie.php");
    $id = $_GET['spelersid'];
    $sql = "DELETE FROM spelers WHERE spelersid=:spelersid";
    $query = $dbConn->prepare($sql);
    $query->execute(array(':spelersid' => $id));
    header("location:spelers.php");
?>