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



                                            &nbsp;&nbsp;<a href="viewleaveApprovals.php" target="_self" style="background-image: url('../css/images/viewleaveApproval.png'); width: 200px; height: 35px; display: inline-block;"></a>

                                            <h3 align="center"><u>Leave Management Module</u></h3>
                                            <br />

                                            <form name="" action="saveLeave.php" method="post">

                                                <table align="center" width="50%" style="padding: 5px; border: 1px dashed rgb(153,153,153);">
                                                    <tr>
                                                        <td align="right" style="padding: 5px; color: #663300;">Employee ID: </td>
                                                        <td align="left" style="padding: 5px;"><input type="text" name="empID" readonly="readonly" value="<?php echo $id; ?>" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" style="padding: 5px; color: #663300;">Staff Type: </td>
                                                        <td align="left" style="padding: 5px;">
                                                            <select name="staffType" size="1"  style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);">
                                                                <option value="Academic">Academic</option>
                                                                <option value="Non-Academic">Non-Academic</option>
                                                            </select>
                                                        </td>    
                                                    </tr>
                                                    <tr>
                                                        <td align="right" style="padding: 5px; color: #663300;">Request Leave Type: </td>
                                                        <td align="left" style="padding: 5px;">
                                                            <select name="leaveType" size="1"  style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);">
                                                                <option value="Annual">Annual</option>
                                                                <option value="Maternal">Maternal</option>
                                                                <option value="Sick Leave">Sick Leave</option>
                                                                <option value="Marriage">Marriage</option>
                                                                <option value="Special">Special</option>
                                                            </select>
                                                        </td>    
                                                    </tr>
                                                    <tr>
                                                        <td align="right" style="padding: 5px; color: #663300;">Request form: </td>
                                                        <td align="left" style="padding: 5px;">
                                                            From: <input type="text" name="requestFrom" id="dob1" style="width: 110px; padding: 5px; border: 1px solid rgb(153,153,153);" />
                                                            To: <input type="text" name="requestTo" id="dob2" style="width: 110px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" style="padding: 5px; color: #663300;" valign="top">Reason for Leave Request: </td>
                                                        <td align="left" style="padding: 5px;">
                                                            <textarea name="leaveReason" style="width: 300px; height: 100px; overflow: auto; padding: 5px; border: 1px solid rgb(153,153,153);"></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" align="right" style="padding: 5px; color: #663300;" valign="top">
                                                            <input type="reset" style="background-image: url('../css/images/reset.png'); width: 100px; height: 25px; display: inline-block;" value="" />&nbsp;&nbsp;&nbsp;

                                                            <input type="submit" style="background-image: url('../css/images/request.png'); width: 100px; height: 25px; display: inline-block;" value="" />

                                                        </td>
                                                    </tr>

                                                </table>

                                            </form>

                                            <br />

                                        </div>
                                        <div id="footer">
                                            <br />
                                            <br />
                                            <p align="center">Copyright 2013 &copy; [ Hawassa Polytechnic College HRMS ] &middot; All Right Reserved &middot; <a href="#">PG Students Project</a></p>
                                        </div>
                                    </div>

                                </body>