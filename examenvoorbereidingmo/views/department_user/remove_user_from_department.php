<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/database.php';

$db = new Database();

$db->remove_user_from_department($_GET['department_id'], $_GET['user_id']);

header('Location: /views/department_user/index.php');
