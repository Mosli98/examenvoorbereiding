<?php
    include("connectie.php");
    $id = $_GET['scholenid'];
    $sql = "DELETE FROM scholen WHERE scholenid=:scholenid";
    $query = $dbConn->prepare($sql);
    $query->execute(array(':scholenid' => $id));
    header("location:scholen.php");
?>