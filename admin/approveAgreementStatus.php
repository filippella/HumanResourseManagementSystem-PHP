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

$empID = $_GET['empID'];

$res = $Db->approveEmployeeAgreementStatus($empID);

if ($res == 1) {
    header("location: viewTrainingAgreement.php");
    exit;
} else {
    header("location: failed.php?msg2='Employee with ID $empID has not Successfully Approved his/ her agreement Form!'");
    exit;
}
?>
