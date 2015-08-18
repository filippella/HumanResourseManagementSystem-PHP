<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
if (!isset($_SESSION['employee'])) {
    header("location: ../index.php");
    exit;
}
$id = $_SESSION['employee'];

require_once('../include/MySqlDb.php');
$Db = new MysqlDB();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Language" content="en-us">
            <meta http-equiv="Content-Type" CONTENT="text/html; charset=utf-8">
                <meta NAME="description" CONTENT="">
                    <meta NAME="keywords" CONTENT="">
                        <meta NAME="PUBLISHER" CONTENT="">
                            <meta NAME="LANGUAGE" CONTENT="English">
                                <link rel="shortcut icon" href="../css/images/favicon.png" />
                                <title>Human Resource Management System</title>
                                <link rel="stylesheet" href="../css/themes/base/jquery.ui.all.css" />
                                <script src="../js/jquery-1.9.1.js"></script>
                                <script src="../js/jquery.ui.core.js"></script>
                                <script src="../js/jquery.ui.widget.js"></script>
                                <script src="../js/jquery.ui.datepicker.js"></script>
                                <style type="text/css" rel="stylesheet">
                                    @import url("../css/style.css");
                                </style>
                                <script>
                                    $(function() {
                                        $( "#dob1" ).datepicker();
                                        $( "#dob2" ).datepicker();
                                    });
                                </script>
                                </head>
                                <body>

                                    <div id="container">
                                        <div id="header"></div>
                                        <div id="links" align="right">
                                            <a href="index.php" target="_self" class="home_button"></a>
                                            <a href="appraisal.php" target="_self" class="appraisal_button"></a>
                                            <a href="leave.php" target="_self" class="leave_button"></a>
                                            <a href="training.php" target="_self" class="training_button"></a>
                                            <a href="promotion.php" target="_self" class="promotion_button"></a>
                                            <a href="pension.php" target="_self" class="pension_button"></a>
                                            <a href="logout.php" target="_self" class="logout_button"></a>
                                        </div>
                                        <div id="links2" align="right" style="">
                                            <a href="edit.php" target="_self" style="background-image: url('../css/images/edit.png'); width: 100px; height: 25px; display: inline-block;"></a>&nbsp;&nbsp;
                                            <a href="changePassword.php" target="_self" style="background-image: url('../css/images/changePassword.png'); width: 150px; height: 25px; display: inline-block;"></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                        </div>
                                        <div id="content">

                                            <h3 align="center"><u>Planned Training Posted by Administrator</u></h3>
                                            <br />


                                            <table align="center" width="98%" style="padding: 5px; border: 1px dashed rgb(153,153,153);">
                                                <tr>
                                                    <td align="center" style="background-color: #cccccc; padding: 5px; color: #cd0a0a; border: 1px solid rgb(153,153,153);"><b>Employee ID</b> </td>
                                                    <td align="center" style="background-color: #cccccc; padding: 5px; color: #cd0a0a; border: 1px solid rgb(153,153,153);"><b>First Name</b> </td>
                                                    <td align="center" style="background-color: #cccccc; padding: 5px; color: #cd0a0a; border: 1px solid rgb(153,153,153);"><b>Last Name</b> </td>
                                                    <td align="center" style="background-color: #cccccc; padding: 5px; color: #cd0a0a; border: 1px solid rgb(153,153,153);"><b>Planned Training</b> </td>
                                                    <td align="center" style="background-color: #cccccc; padding: 5px; color: #cd0a0a; border: 1px solid rgb(153,153,153);"><b>Number of Participant</b> </td>
                                                    <td align="center" style="background-color: #cccccc; padding: 5px; color: #cd0a0a; border: 1px solid rgb(153,153,153);"><b>Planned Date</b> </td>
                                                </tr>
                                                <?php
                                                $query = mysql_query("SELECT * FROM  `trainingplan`");
                                                if ($query) {
                                                    $i = 0;
                                                    while ($row = mysql_fetch_array($query)) {
                                                        $empID = $row['empID'];
                                                        $innerQuery1 = mysql_query("SELECT * FROM  `employeegeneralinformation` where empID = '$empID'");
                                                        $row1 = "";
                                                        if ($innerQuery1) {
                                                            $row1 = mysql_fetch_array($innerQuery1);
                                                        } else {
                                                            
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td align="center" style="padding: 5px; border: 1px solid rgb(153,153,153);"><?php echo $empID; ?></td>
                                                            <td align="center" style="padding: 5px; border: 1px solid rgb(153,153,153);"><?php echo $row1['firstName']; ?></td>
                                                            <td align="center" style="padding: 5px; border: 1px solid rgb(153,153,153);"><?php echo $row1['lastName']; ?></td>
                                                            <td align="center" style="padding: 5px; border: 1px solid rgb(153,153,153);"><?php echo $row['plannedTraining']; ?></td>
                                                            <td align="center" style="padding: 5px; border: 1px solid rgb(153,153,153);"><?php echo $row['numberOfParticipant']; ?></td>
                                                            <td align="center" style="padding: 5px; border: 1px solid rgb(153,153,153);"><?php echo $row['date']; ?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                <tr>
                                                    <td colspan="6" align="right" style="padding: 5px;">
                                                        <a href="fillAgreement.php" target="_self" style="background-image: url('../css/images/fill_Agreement.png'); width: 150px; height: 35px; display: inline-block;"></a>

                                                    </td>
                                                </tr>
                                            </table>

                                            <br />



                                            <br />
                                        </div>
                                        <div id="footer">
                                            <br />
                                            <br />
                                            <p align="center">Copyright 2013 &copy; [ Hawassa Polytechnic College HRMS ] &middot; All Right Reserved &middot; <a href="#">PG Students Project</a></p>
                                        </div>
                                    </div>

                                </body>
                                </html>