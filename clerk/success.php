<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
if (!isset($_SESSION['clerk'])) {
    header("location: ../index.php");
    exit;
}

$msg = "";
if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
}

if (isset($_GET['msg2'])) {
    $msg = $_GET['msg2'];
}
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

                                <link rel="stylesheet" href="../css/themes/base/jquery.ui.all.css" />
                                <script src="../js/jquery-1.9.1.js"></script>
                                <script src="../js/jquery.ui.core.js"></script>
                                <script src="../js/jquery.ui.effect.js"></script>


                                <title>Human Resource Management System</title>
                                <style type="text/css" rel="stylesheet">
                                    @import url("../css/style.css");
                                </style>
                                <style>
                                    #effect { width: 240px; height: 80px; padding: 0.4em; position: relative; background: #fff; }
                                    #effect h3 { margin: 0; padding: 0.4em; text-align: center; }
                                </style>
                                <script>
                                    function fadeOnLoad() {
                                        $( "#effect" ).animate({
                                            backgroundColor: "green",
                                            color: "#fff",
                                            width: 500
                                        }, 1000 );
                                    }
                                </script>
                                </head>
                                <body onload="fadeOnLoad()">

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
                                            <a href="view.php" target="_self" style="background-image: url('../css/images/view.png'); width: 100px; height: 25px; display: inline-block;"></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                            </div>
                                        <div id="content">


                                            <div class="toggler" align="center">
                                                <div id="effect" class="ui-widget-content ui-corner-all">
                                                    <h3 class="ui-widget-header ui-corner-all">Message</h3>
                                                    <table align="center" width="100%">
                                                        <tr>
                                                            <td valign="middle"><img src="../css/images/success.gif" /></td>
                                                            <?php
                                                            if (isset($_GET['msg2'])) {
                                                              ?>
                                                            <td valign="middle"><?php echo $_GET['msg2']; ?></td>
                                                            <?php
                                                            }
                                                            else{
                                                            ?>
                                                            <td valign="middle">Employee Information is Successfully <?php echo $msg; ?> HRMS Database.</td>
                                                        <?php }?>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>


                                        </div>
                                        <div id="footer">
                                            <br />
                                            <br />
                                            <p align="center">Copyright 2013 &copy; [ Hawassa Polytechnic College HRMS ] &middot; All Right Reserved &middot; <a href="#">PG Students Project</a></p>
                                        </div>
                                    </div>

                                </body>