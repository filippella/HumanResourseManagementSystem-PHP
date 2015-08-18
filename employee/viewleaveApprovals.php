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

                                            <div align="right" style="width: 100%;">
                                                <form action="#" method="post">
                                                    <input type="text" style="padding: 5px; border: 1px solid rgb(153,153,153); background:url('../css/images/searchImg.png') no-repeat 100% 50%" name="q" size="31" />
                                                    <input type="submit" name="sa" value="Search" style="height: 25px;border: 1px solid #3399ff; border-radius: 5px;" />
                                                </form>
                                            </div>

                                            <h3 align="center"><u>View Leave Request Approval</u></h3>
                                            <br />



                                            <table align="center" width="99%" style="padding: 5px; border: 1px dashed rgb(153,153,153);">
                                                <tr>
                                                    <td align="center" style="background-color: #cccccc; padding: 5px; color: #00F; border: 1px solid rgb(153,153,153);"><b>Employee ID:</b> </td>
                                                     </td>
                                                    <td align="center" style="background-color: #cccccc; padding: 5px; color: #00F; border: 1px solid rgb(153,153,153);"><b>Staff Type: </b> </td>
                                                    <td align="center" style="background-color: #cccccc; padding: 5px; color: #00F; border: 1px solid rgb(153,153,153);"><b>Request Leave Type: </b> </td>
                                                    <td align="center" style="background-color: #cccccc; padding: 5px; color: #00F; border: 1px solid rgb(153,153,153);"><b>Request From-To: </b> </td>
                                                    <td align="center" style="background-color: #cccccc; padding: 5px; color: #00F; border: 1px solid rgb(153,153,153);"><b>Lease Reason:</b>
                                                        <td align="center" style="background-color: #cccccc; padding: 5px; color: #00F; border: 1px solid rgb(153,153,153);"><b>Approved:</b>
                                                    <td align="center" style="background-color: #cccccc; padding: 5px; color: #00F; border: 1px solid rgb(153,153,153);"><b>Request Date: </b> </td>
                                                </tr>

                                                <?php
                                                $query = mysql_query("SELECT * FROM  `EmployeeLeaveRequest` where empID = '$id'");
                                                if ($query) {
                                                    $i = 0;
                                                    while ($row = mysql_fetch_array($query)) {
                                                        $empID = $row['empID'];
                                                        ?>
                                                        <tr>
                                                            <td align="left" style="padding: 5px; color: #663300; border: 1px solid rgb(153,153,153);"><?php echo $empID; ?></td>
                                                            <td align="left" style="padding: 5px; color: #663300; border: 1px solid rgb(153,153,153);"><?php echo $row['staffType']; ?></td>
                                                            <td align="left" style="padding: 5px; color: #663300; border: 1px solid rgb(153,153,153);"><?php echo $row['leaveType']; ?></td>
                                                            <td align="left" style="padding: 5px; color: #663300; border: 1px solid rgb(153,153,153);"><?php echo $row['requestFrom']."-".$row['requestTo']; ?></td>
                                                            <td align="left" style="padding: 5px; color: #663300; border: 1px solid rgb(153,153,153);"><?php echo $row['leaveReason']; ?></td>
                                                            <td align="left" style="padding: 5px; color: #663300; border: 1px solid rgb(153,153,153);"><?php 
                                                            $ls = $row['status'];
                                                            if($ls=="NO") {
                                                                echo "<b style='color: red'>Not Approved</b>";
                                                            }
                                                            else {
                                                                echo "<b style='color: green'>Approved</b>";
                                                            }
                                                            ?></td>
                                                            <td align="left" style="padding: 5px; color: #663300; border: 1px solid rgb(153,153,153);"><?php echo $row['requestDate']; ?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </table>
                                            <br />


                                        </div>
                                        <div id="footer">
                                            <br />
                                            <br />
                                            <p align="center">Copyright 2013 &copy; [ Hawassa Polytechnic College HRMS ] &middot; All Right Reserved &middot; <a href="#">PG Students Project</a></p>
                                        </div>
                                    </div>

                                </body>