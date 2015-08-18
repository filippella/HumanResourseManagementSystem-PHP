<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('../include/MySqlDb.php');
$Db = new MysqlDB();

$empID = $_POST['empID'];

$query1 = mysql_query("SELECT * FROM employeegeneralinformation where empID = '$empID'");

if ($query1) {
    $empNum = mysql_num_rows($query1);
    if ($empNum > 0) {
        $query2 = mysql_query("DELETE FROM employeegeneralinformation where empID = '$empID'");

        if ($query2) {
            header("location: success.php?msg='Deleted from'");
            exit;
        } else {
            header("location: failed.php?msg2='Employee was Not Deleted for unknown Reason from from HRMS Database'");
            exit;
        }
    } else {
        header("location: failed.php?msg2='Employee was Not found from HRMS Database'");
        exit;
    }
} else {
    header("location: failed.php?msg2='Employee was Not Deleted for unknown Reason from from HRMS Database'");
    exit;
}
?>
