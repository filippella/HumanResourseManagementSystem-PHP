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
$palnnedTraining = $_POST['palnnedTraining'];
$numberofParticipant = $_POST['numberofParticipant'];

foreach ($empID as $a => $b) {
    $res = $Db->saveTrainingPlan($empID[$a], $palnnedTraining[$a], $numberofParticipant[$a]);
}

if ($res == 1) {
    header("location: success.php?msg2='Employee Training Plan is Successfully Recorded to HRMS Database'");
    exit;
} else {
    header("location: failed.php?msg2='Employee Training Plan is Not Successfully Recorded to HRMS Database'");
    exit;
}
?>
