<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('../include/MySqlDb.php');
$Db = new MysqlDB();

$empID = $_POST['id'];

$currentSalary = $_POST['currentSalary'];
$qualification = $_POST['qualification'];
$guarantee = $_POST['guarantee'];
$trainingType = $_POST['trainingType'];
$trainingDurationFrom = $_POST['trainingDurationFrom'];
$trainingDurationTo = $_POST['trainingDurationTo'];
$trainingBudget = $_POST['trainingBudget'];
$contractProvider = $_POST['contractProvider'];


$res = $Db->saveEmployeeTrainingAgreement($empID, $currentSalary, $qualification, $guarantee, $trainingType, $trainingDurationFrom, $trainingDurationTo, $trainingBudget, $contractProvider);


if ($res == 1) {
    header("location: success.php?msg2='Employee Training Agreement Information is Successfully Recorded to HRMS Database'");
    exit;
} else {
    header("location: failed.php?msg2='Employee Training Agreement Information is Not Successfully Recorded to HRMS Database'");
    exit;
}

?>
