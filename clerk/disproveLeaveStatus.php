<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
if (!isset($_SESSION['clerk'])) {
    header("location: ../index.php");
    exit;
}
require_once('../include/MySqlDb.php');
$Db = new MysqlDB();

$empID = $_GET['empID'];

$res = $Db->disproveLeaveAgreementStatus($empID);

if ($res == 1) {
    header("location: employeeLeaveRequest.php");
    exit;
} else {
    header("location: failed.php?msg2='Employee with ID $empID has not Successfully Approved his/ her Leave Request!'");
    exit;
}
?>
