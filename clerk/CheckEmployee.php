<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('../include/MySqlDb.php');
$Db = new MysqlDB();

if (isset($_POST['empID'])) {

    $val = $_POST['empID'];

    if (!$val == "") {
        $q1 = mysql_query("SELECT * FROM  `employeegeneralinformation` where empID = '$val'");
        if ($q1) {
            $check = mysql_num_rows($q1);
            if ($check > 0) {
                echo "../css/images/no.png";
            } else {
                echo "../css/images/tick.png";
            }
        } else {
            
        }
    } else {
        echo "";
    }
}
?>
