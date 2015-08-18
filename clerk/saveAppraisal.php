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

$empID = $_POST['empID'];
$academicYear = $_POST['academicYear'];
$durationFrom = $_POST['durationFrom'];
$durationTo = $_POST['durationTo'];


$staffType = $_POST['staffType'];


if ($staffType == "1") {
    $academicEvaluation = $_POST['academicEvaluation'];
    $technologyTransfer = $_POST['technologyTransfer'];
    $industrialExtension = $_POST['industrialExtension'];
    $financeDepartment = "";
    $hrmDepartment = "";
    $staffType = "Academic";
} else {
    $financeDepartment = $_POST['financeDepartment'];
    $hrmDepartment = $_POST['hrmDepartment'];
    $academicEvaluation = "";
    $technologyTransfer = "";
    $industrialExtension = "";
    $staffType = "Non-Academic";
}

$totalScore = $_POST['totalScore'];
$evaluatedBy = $_POST['evaluatedBy'];
$carrierStatus = $_POST['carrierStatus'];
$year = $_POST['year'];

$res = $Db->saveEmployeeAppraisal($empID, $academicYear, $durationFrom, $durationTo, $staffType, $academicEvaluation, $technologyTransfer, $industrialExtension, $financeDepartment, $hrmDepartment, $totalScore, $evaluatedBy, $carrierStatus, $year);

if ($res == 1) {
    header("location: success.php?msg2='Employee Appraisal Information is Successfully Recorded to HRMS Database'");
    exit;
} else {
    header("location: failed.php?msg2='Employee Appraisal Information is Not Successfully Recorded to HRMS Database'");
    exit;
}

?>
