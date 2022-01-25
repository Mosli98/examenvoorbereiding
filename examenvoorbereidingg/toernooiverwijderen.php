<?php
    include("connectie.php");
    $id = $_GET['toernooienid'];
    $sql = "DELETE FROM toernooien WHERE toernooienid=:toernooienid";
    $query = $dbConn->prepare($sql);
    $query->execute(array(':toernooienid' => $id));
    header("location:toernooien.php");
?>