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

require_once('../INCLUDE/MySqlDb.php');
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
                                <style type="text/css" rel="stylesheet">
                                    @import url("../css/style.css");
                                </style>

                                </head>
                                <body>

                                    <div id="container">
                                        <div id="header"></div>
                                        <div id="links" align="right" style="">
                                            <a href="index.php" target="_self" class="home_button"></a>
                                            <a href="recruitment.php" target="_self" class="recruitment_button"></a>
                                            <a href="training.php" target="_self" class="training_button"></a>
                                            <a href="appraisal.php" target="_self" class="appraisal_button"></a>
                                            <a href="promotion.php" target="_self" class="promotion_button"></a>
                                            <a href="pension.php" target="_self" class="pension_button"></a>
                                            <a href="report.php" target="_self" class="report_button"></a>
                                            <a href="logout.php" target="_self" class="logout_button"></a>
                                        </div>
                                        <div id="links2" align="right" style="">
                                            <a href="employeeDetail.php" target="_self" style="background-image: url('../css/images/add.png'); width: 100px; height: 25px; display: inline-block;"></a>&nbsp;&nbsp;
                                            <a href="edit.php" target="_self" style="background-image: url('../css/images/edit.png'); width: 100px; height: 25px; display: inline-block;"></a>&nbsp;&nbsp;
                                            <a href="delete.php" target="_self" style="background-image: url('../css/images/delete.png'); width: 100px; height: 25px; display: inline-block;"></a>&nbsp;&nbsp;
                                            <a href="search.php" target="_self" style="background-image: url('../css/images/search.png'); width: 100px; height: 25px; display: inline-block;"></a>&nbsp;&nbsp;
                                            <a href="view.php" target="_self" style="background-image: url('../css/images/view.png'); width: 100px; height: 25px; display: inline-block;"></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="control.php" target="_self" style="background-image: url('../css/images/control.png'); width: 150px; height: 25px; display: inline-block;"></a>
                                        </div>
                                        <div id="content">


                                            <br />
                                            <div style="text-align: center;">
                                                <?php
                                                if (isset($_POST['createClerk'])) {

                                                    $userName = $_POST['clerkID'];
                                                    $userPassword = $_POST['clerkPass'];
                                                    $ccp = $_POST['clerkConfirmPass'];

                                                    if ($userPassword != $ccp) {
                                                        echo "<b style='color: red;'>The Two Passwords does not Match!!!</b>";
                                                    } else {
                                                        $query = $Db->createClearkAccountInformation($userName, $userPassword, "HRM Clerk", "enabled");
                                                        if ($query) {
                                                            echo "<b style='color: green;'>Clerk Account has beeen Created Successfully!!!</b>";
                                                        } else {
                                                            echo "<b style='color: red;'>Sorry there was a problem while creating Clerk Account. " . mysql_error() . "!!!</b>";
                                                        }
                                                    }
                                                }
                                                ?>
                                            </div>
                                            <br />
                                            <form name="" action="" method="post">
                                                <table align="center" width="60%" style="border: 1px solid #000000;">
                                                    <tr>
                                                        <td align="center" colspan="2" style="padding: 15px; background-color: lightcyan;"><h3>Create New Clerk Account</h3></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" style="padding: 5px;  border: 1px solid rgb(153,153,153);"><b>Clerk UserName</b></td>
                                                        <td align="center" style="padding: 5px;  border: 1px solid rgb(153,153,153);"><input type="text" name="clerkID" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" style="padding: 5px;  border: 1px solid rgb(153,153,153);"><b>Clerk Password</b></td>
                                                        <td align="center" style="padding: 5px;  border: 1px solid rgb(153,153,153);"><input type="password" name="clerkPass" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" style="padding: 5px;  border: 1px solid rgb(153,153,153);"><b>Confirm Clerk Password</b></td>
                                                        <td align="center" style="padding: 5px;  border: 1px solid rgb(153,153,153);"><input type="password" name="clerkConfirmPass" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" colspan="2" style="padding: 10px;  border: 1px solid rgb(153,153,153);">
                                                            <input type="submit" name="createClerk" value="" style="background-image: url('../css/images/createAcc.png'); width: 80px; height: 30px; display: inline-block;" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </form>

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