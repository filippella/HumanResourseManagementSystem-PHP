<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('../include/MySqlDb.php');
$Db = new MysqlDB();

$empID = $_POST['id'];
$skillGapRequested = $_POST['skillGap'];

$date = date("l, d-M-y H:i:s");
$res = $Db->saveEmployeeSkillGap($empID, $skillGapRequested, $date);


if ($res == 1) {
    header("location: success.php?msg2='Employee Skill Gap Information is Successfully Recorded to HRMS Database'");
    exit;
} else {
    header("location: failed.php?msg2='Employee Skill Gap Information is Not Successfully Recorded to HRMS Database'");
    exit;
}
?>
