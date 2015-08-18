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
                                <script language="javascript" type="text/javascript">
                                    function checkLogin() {
                                        var us = document.getElementById('username').value;
                                        var pas = document.getElementById('password').value;
                                        var rt = document.getElementById('roleType').value;
                                        if((us=="")||(pas=="")||(rt=="")) {
                                            if(rt=="") {
                                                document.getElementById("status").innerHTML = "<i style='color: red;'>Please specify a valid Role Type!</i>";
                                            }
                                            if(pas=="") {
                                                document.getElementById("status").innerHTML = "<i style='color: red;'>Please specify a valid Password!</i>";
                                            }
                                            if(us=="") {
                                                document.getElementById("status").innerHTML = "<i style='color: red;'>Please specify a valid Username!</i>";
                                            }                                                                                        
                                            return false;
                                        }
                                        return true;
                                    }
                                </script>
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

                                            <div align="right" style="width: 100%;">
                                                <form action="#" method="post">
                                                    <input type="text" style="padding: 5px; border: 1px solid rgb(153,153,153); background:url('../css/images/searchImg.png') no-repeat 100% 50%" name="q" size="31" />
                                                    <input type="submit" name="sa" value="Search" style="height: 25px;border: 1px solid #3399ff; border-radius: 5px;" />
                                                </form>
                                            </div>

                                            <h3 align="center"><u>View Training Agreements</u></h3>
                                            <br />

                                            <?php
                                            if (isset($_POS['saveApproveStatus'])) {
                                                $chkVal = $_POST['approveStatus'];
                                            }
                                            ?>

                                            <form name="" action="" method="post">

                                                <table align="center" width="99%" style="padding: 5px; border: 1px dashed rgb(153,153,153);">
                                                    <tr>
                                                        <td align="center" style="background-color: #cccccc; padding: 5px; color: #cd0a0a; border: 1px solid rgb(153,153,153);"><b>ID:</b> </td>
                                                        <td align="center" style="background-color: #cccccc; padding: 5px; color: #cd0a0a; border: 1px solid rgb(153,153,153);"><b>First Name:</b> </td>
                                                        <td align="center" style="background-color: #cccccc; padding: 5px; color: #cd0a0a; border: 1px solid rgb(153,153,153);"><b>Last Name:</b> </td>
                                                        <td align="center" style="background-color: #cccccc; padding: 5px; color: #cd0a0a; border: 1px solid rgb(153,153,153);"><b>Current Salary:</b> </td>
                                                        <td align="center" style="background-color: #cccccc; padding: 5px; color: #cd0a0a; border: 1px solid rgb(153,153,153);"><b>Qualification: </b> </td>
                                                        <td align="center" style="background-color: #cccccc; padding: 5px; color: #cd0a0a; border: 1px solid rgb(153,153,153);"><b>Guarantee: </b> </td>
                                                        <td align="center" style="background-color: #cccccc; padding: 5px; color: #cd0a0a; border: 1px solid rgb(153,153,153);"><b>Training Type: </b> </td>
                                                        <td align="center" style="background-color: #cccccc; padding: 5px; color: #cd0a0a; border: 1px solid rgb(153,153,153);"><b>From: </b> </td>
                                                        <td align="center" style="background-color: #cccccc; padding: 5px; color: #cd0a0a; border: 1px solid rgb(153,153,153);"><b>To: </b> </td>
                                                        <td align="center" style="background-color: #cccccc; padding: 5px; color: #cd0a0a; border: 1px solid rgb(153,153,153);"><b>Training Budget: </b> </td>
                                                        <td align="center" style="background-color: #cccccc; padding: 5px; color: #cd0a0a; border: 1px solid rgb(153,153,153);"><b>Contract Provider: </b> </td>
                                                        <td align="center" style="background-color: #cccccc; padding: 5px; color: #cd0a0a; border: 1px solid rgb(153,153,153);"><b>Approve Status: </b> </td>
                                                    </tr>

                                                    <?php
                                                    $query = mysql_query("SELECT * FROM  `EmployeeTrainingAgreementForm`");
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
                                                                <td align="left" style="padding: 5px; color: #663300; border: 1px solid rgb(153,153,153);"><?php echo $empID; ?></td>
                                                                <td align="left" style="padding: 5px; color: #663300; border: 1px solid rgb(153,153,153);"><?php echo $row1['firstName']; ?></td>
                                                                <td align="left" style="padding: 5px; color: #663300; border: 1px solid rgb(153,153,153);"><?php echo $row1['lastName']; ?></td>
                                                                <td align="left" style="padding: 5px; color: #663300; border: 1px solid rgb(153,153,153);"><?php echo $row['currentSalary']; ?></td>
                                                                <td align="left" style="padding: 5px; color: #663300; border: 1px solid rgb(153,153,153);"><?php echo $row['qualification']; ?></td>
                                                                <td align="left" style="padding: 5px; color: #663300; border: 1px solid rgb(153,153,153);"><?php echo $row['guarantee']; ?></td>
                                                                <td align="left" style="padding: 5px; color: #663300; border: 1px solid rgb(153,153,153);"><?php echo $row['trainingType']; ?></td>
                                                                <td align="left" style="padding: 5px; color: #663300; border: 1px solid rgb(153,153,153);"><?php echo $row['trainingDurationFrom']; ?></td>
                                                                <td align="left" style="padding: 5px; color: #663300; border: 1px solid rgb(153,153,153);"><?php echo $row['trainingDurationTo']; ?></td>
                                                                <td align="left" style="padding: 5px; color: #663300; border: 1px solid rgb(153,153,153);"><?php echo $row['trainingBudget']; ?></td>
                                                                <td align="left" style="padding: 5px; color: #663300; border: 1px solid rgb(153,153,153);"><?php echo $row['contractProvider']; ?></td>
                                                                <td align="center" style="padding: 5px; color: #663300; border: 1px solid rgb(153,153,153);">

                                                                    <?php
                                                                    $st = $row['approveStatus'];
                                                                    if ($st == 'NO') {
                                                                        ?>
                                                                        <a href="approveAgreementStatus.php?empID=<?php echo $empID; ?>" target="_self" style="background-image: url('../css/images/approve.png'); width: 60px; height: 30px; display: inline-block;"></a>

                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <a href="disproveAgreementStatus.php?empID=<?php echo $empID; ?>" target="_self" style="background-image: url('../css/images/disprove.png'); width: 60px; height: 30px; display: inline-block;"></a>
                                                                        <?php
                                                                    }
                                                                    ?>

                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
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