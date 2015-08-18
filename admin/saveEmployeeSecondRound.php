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

$empID = $_POST['empID'];

$vacCode = $_POST['vacCode'];
$examResult = $_POST['examResult'];
$interviewResult = $_POST['interviewResult'];



$res = $Db->saveSecondRound($empID, $vacCode, $examResult, $interviewResult);

if ($res == 1) {
    header("location: success.php?msg2='Employee Second Round Result Information is Successfully Recorded to HRMS Database'");
    exit;
} else {
    header("location: failed.php?msg2='Employee Second Round Result Information is Not Successfully Recorded to HRMS Database'");
    exit;
}
?>
