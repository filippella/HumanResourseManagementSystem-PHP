<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('include/MySqlDb.php');
$Db = new MysqlDB();

$vacCode = $_POST['vacCode'];
$empID = $_POST['empID'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$sex = $_POST['gender'];
$date = $_POST['date'];
$gpa = $_POST['gpa'];
$experience = $_POST['experience'];


$st = $Db->saveClientApplication($empID, $vacCode, $firstName, $lastName, $sex, $date, $gpa, $experience);

if ($st == 1) {
    header("location: success.php?msg2=Client Application Form Information is Successfully saved to HRMS Database");
    exit;
} else {
    header("location: failed.php?msg2=Client Application Form Information was not Successfully saved to HRMS Database");
    exit;
}
?>
