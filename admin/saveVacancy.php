<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

//GET CONNECTED TO WEB SERVER, MYSQL DATABASE and do the DDL DML

session_start();
if (!isset($_SESSION['admin'])) {
    header("location: ../index.php");
    exit;
}

require_once('../include/MySqlDb.php');
$Db = new MysqlDB();

//RETRIVE form values from the form using the POST method

$vacCode = $_POST['vacCode'];
$vacName = $_POST['vacName'];
$vacDepartment = $_POST['vacDepartment'];
$openDate = $_POST['openDate'];
$closeDate = $_POST['closeDate'];
$requiredNumber = $_POST['requiredNumber'];
$salary = $_POST['salary'];
$detailVacancy = $_POST['detailVacancy'];
$recruitmentNotice = $_POST['recruitmentNotice'];

$res = $Db->saveRecruitment($vacCode, $vacName, $vacDepartment, $openDate, $closeDate, $requiredNumber, $salary, $detailVacancy, $recruitmentNotice);

if ($res == 1) {
    header("location: success.php?msg2='Recruitment Information is Successfully Recorded to HRMS Database'");
    exit;
} else {
    header("location: failed.php?msg2='Recruitment Information is Not Successfully Recorded to HRMS Database'");
    exit;
}
?>
