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

$qw1 = mysql_query("SELECT * FROM  `employeegeneralinformation` where empID = '$empID'");
$qw2 = mysql_query("SELECT * FROM  `employeecontactinformation` where empID = '$empID'");
$qw3 = mysql_query("SELECT * FROM  `employeeaddressinformation` where empID = '$empID'");
$qw4 = mysql_query("SELECT * FROM  `employeepersonalinformation` where empID = '$empID'");
$qw5 = mysql_query("SELECT * FROM  `employeeemploymentinformation` where empID = '$empID'");
$qw6 = mysql_query("SELECT * FROM  `employeeemergencycontactinformation` where empID = '$empID'");

$binary_data = "";

$row1 = "";
if ($qw1) {
    if (mysql_num_rows($qw1) < 1) {
        header("location: employeeIDNotFound.php");
        exit;
    }
} else {
    die(mysql_error());
}

$empID = $_POST['empID'];
$staffType = $_POST['staffType'];
$currentSalary = $_POST['currentSalary'];
$dob = $_POST['dob'];
$age = $_POST['age'];
$hiredDate = $_POST['hiredDate'];
$retiredDate = $_POST['retiredDate'];
$retirementSalary = $_POST['retirementSalary'];
$experience = $_POST['experience'];

$res = $Db->savePension($empID, $staffType, $currentSalary, $dob, $age, $hiredDate, $retiredDate, $retirementSalary);

header("location: successAll.php");
exit;


?>