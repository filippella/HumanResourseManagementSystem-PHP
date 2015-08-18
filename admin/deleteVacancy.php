<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
if (!isset($_SESSION['admin'])) {
    header("location: ../index.php");
    exit;
}
require_once('../include/MySqlDb.php');
$Db = new MysqlDB();

$vacID = $_GET['vacID'];

$res = mysql_query("DELETE FROM employeerecruitment where vacCode = '$vacID'");

if ($res == 1) {
    header("location: vacancyList.php");
    exit;
} else {
    header("location: failed.php?msg2=Vacancy has not been Deleted Successfully!");
    exit;
}
?>
