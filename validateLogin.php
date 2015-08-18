<?php

require_once('include/MySqlDb.php');
$Db = new MysqlDB();

$userN = $_POST['username'];
$passW = $_POST['password'];
$userT = $_POST['roleType'];

$result = $Db->verifyPassword($userN, $passW, $userT);

if ($result == 1) {    
    if ($userT == "admin") {
        session_start();
        $_SESSION['admin'] = $userN;
        header("location: admin/");
        exit;
    } else if ($userT == "employee") {
        session_start();
        $_SESSION['employee'] = $userN;
        header("location: employee/");
        exit;
    } else if ($userT == "HRM Clerk") {
        session_start();
        $_SESSION['clerk'] = $userN;
        header("location: clerk/");
        exit;
    }
} else {
    header("location: error.php");
    exit;
}
?>
