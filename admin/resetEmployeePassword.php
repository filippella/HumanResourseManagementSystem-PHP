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

$id = $_SESSION['admin'];

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

                                <link rel="stylesheet" href="../css/themes/base/jquery.ui.all.css" />
                                <script src="../js/jquery-1.9.1.js"></script>
                                <script src="../js/jquery.ui.core.js"></script>
                                <script src="../js/jquery.ui.widget.js"></script>
                                <script src="../js/jquery.ui.menu.js"></script>

                                <style type="text/css" rel="stylesheet">
                                    @import url("../css/style.css");
                                </style>


                                <script>
                                    $(function() {
                                        $( "#adminControlMenu" ).menu();
                                    });
                                </script>
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

                                            <table style="width: 100%;" align="center">
                                                <tr>
                                                    <td valign="top">

                                                        <div id="error_message" style="padding: 10px;" align="center">

                                                            <?php
                                                            if (isset($_POST['change_password'])) {

                                                                $nw_pas = $_POST['n_p'];
                                                                $conf_pas = $_POST['c_p'];
                                                                $user = $_POST['user'];


                                                                    if ($nw_pas == $conf_pas) {
                                                                        $qt = mysql_query("UPDATE `employeeuseraccount` set userPassword = '$nw_pas' where `userName` = '$user'");
                                                                        echo "<b style='color: green;'>Password has been Resetted Successfully!</b>";
                                                                    } else {
                                                                        echo "<b style='color: red; text-align: center;'>Sorry there was a Problem while Changing your Password!<br>Please try again!!!</b>";
                                                                    }
                                                            }
                                                            ?>

                                                        </div>


                                                        <div style="width: 500px;   height: auto; padding-top: 10px; padding-bottom: 10px;
                                                             background-image: url('images/bg_img.jpg'); margin: 0 auto; margin-bottom: 10px; border-radius: 5px;">


                                                            <p><h3  align="center">Reset Employee Account Password</h3></p>

                                                            <form action="" method="post" onsubmit="return check();">

                                                                <table style="margin: 0 auto; padding: 10px;">
                                                                    <tr>
                                                                        <td align="right" style="padding: 5px;">
                                                                            Username :
                                                                        </td>
                                                                        <td align="right" style="padding: 5px;">
                                                                            <input type="text" style="width: 298px; padding: 5px; border: 1px solid rgb(153,153,153);" id="n_p" name="user"  />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td align="right" style="padding: 5px;">
                                                                            New Password :
                                                                        </td>
                                                                        <td align="right" style="padding: 5px;">
                                                                            <input type="password" style="width: 298px; padding: 5px; border: 1px solid rgb(153,153,153);" id="n_p" name="n_p"  />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td align="right" style="padding: 5px;">
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


                                                    </td>
                                                </tr>
                                            </table>


                                        </div>
                                        <div id="footer">
                                            <br />
                                            <br />
                                            <p align="center">Copyright 2013 &copy; [ Hawassa Polytechnic College HRMS ] &middot; All Right Reserved &middot; <a href="#">PG Students Project</a></p>
                                        </div>
                                    </div>

                                </body>