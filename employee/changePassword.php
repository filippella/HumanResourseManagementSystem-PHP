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

require_once('../include/MySqlDb.php');
$Db = new MysqlDB();

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
                                <style type="text/css" rel="stylesheet">
                                    @import url("../css/style.css");
                                </style>
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

                                            <div id="error_message" style="padding: 10px;" align="center">

                                                <?php
                                                if (isset($_POST['change_password'])) {

                                                    $cur_pas = $_POST['cur_p'];
                                                    $nw_pas = $_POST['n_p'];
                                                    $conf_pas = $_POST['c_p'];

                                                    $q2 = mysql_query("SELECT * FROM `employeeuseraccount` where `userName` = '$id' and userPassword = '$cur_pas'");

                                                    $num_r = mysql_num_rows($q2);
                                                    if ($num_r > 0) {

                                                        if ($nw_pas == $conf_pas) {
                                                            $qt = mysql_query("UPDATE `employeeuseraccount` set userPassword = '$nw_pas' where `userName` = '$id'");
                                                            echo "<b style='color: green;'>Password has been changed Successfully!</b>";
                                                        } else {
                                                            echo "<b style='color: red; text-align: center;'>Sorry there was a Problem while Changing your Password!<br>Please try again!!!</b>";
                                                        }
                                                    } else {
                                                        echo "<b style='color: red; text-align: center;'>Sorry there was a Problem while Changing your Password!<br>Please try again!!!</b>";
                                                    }
                                                }
                                                ?>

                                            </div>


                                            <div style="width: 500px;   height: auto; padding-top: 10px; padding-bottom: 10px;
                                                 background-image: url('images/bg_img.jpg'); margin: 0 auto; margin-bottom: 10px; border-radius: 5px;">


                                                <p><h3  align="center">Change your Account Password</h3></p>

                                                <form name="main_plan" action="" method="post" onsubmit="return check();">

                                                    <table style="margin: 0 auto; padding: 10px;">
                                                        <tr>
                                                            <td align="left" style="padding: 5px;">
                                                                Current Password :
                                                            </td>
                                                            <td align="right" style="padding: 5px;">
                                                                <input type="password" style="width: 298px; padding: 5px; border: 1px solid rgb(153,153,153);" id="cur_p" name="cur_p"  />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" style="padding: 5px;">
                                                                New Password :
                                                            </td>
                                                            <td align="right" style="padding: 5px;">
                                                                <input type="password" style="width: 298px; padding: 5px; border: 1px solid rgb(153,153,153);" id="n_p" name="n_p"  />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" style="padding: 5px;">
                                                                Confirm Password :
                                                            </td>
                                                            <td align="right" style="padding: 5px;">
                                                                <input type="password" style="width: 298px; padding: 5px; border: 1px solid rgb(153,153,153);" id="c_p" name="c_p"  />
                                                            </td>
                                                        </tr>
                                                    </table>

                                                    <p align="right"><input type="submit" name="change_password" value="" style="background-image: url('../css/images/modify_pass.png'); width: 50px; height: 50px; background-color: transparent;" /></p>
                                                </form>

                                            </div>



                                        </div>
                                        <div id="footer">
                                            <br />
                                            <br />
                                            <p align="center">Copyright 2013 &copy; [ Hawassa Polytechnic College HRMS ] &middot; All Right Reserved &middot; <a href="#">PG Students Project</a></p>
                                        </div>
                                    </div>

                                </body>
                                </html>
