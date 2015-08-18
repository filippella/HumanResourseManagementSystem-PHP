<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../include/MySqlDb.php');
$Db = new MysqlDB();

$empID = $_POST['empID'];

$staffType = $_POST['staffType'];
$leaveType = $_POST['leaveType'];
$requestFrom = $_POST['requestFrom'];
$requestTo = $_POST['requestTo'];
$leaveReason = $_POST['leaveReason'];
$requestDate =  date("l, d-M-y H:i:s");


$res = $Db->saveEmployeeLeave($empID, $staffType, $leaveType, $requestFrom, $requestTo, $leaveReason, $requestDate);


if ($res == 1) {
    header("location: success.php?msg2='Employee Leave Request Information is Successfully Recorded to HRMS Database'");
    exit;
} else {
    header("location: failed.php?msg2='Employee Leave Request Information is Not Successfully Recorded to HRMS Database'");
    exit;
}
?>
