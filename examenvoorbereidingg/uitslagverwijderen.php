<?php
    include("connectie.php");
    $id = $_GET['uitslagenid'];
    $sql = "DELETE FROM uitslagen WHERE uitslagenid=:uitslagenid";
    $query = $dbConn->prepare($sql);
    $query->execute(array(':uitslagenid' => $id));
    header("location:uitslagen.php");
?>