<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('INCLUDE/MySqlDb.php');
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
                                <link rel="shortcut icon" href="css/images/favicon.png" />
                                <link rel="stylesheet" href="../css/themes/base/jquery.ui.all.css" />
                                <script src="js/jquery-1.9.1.js"></script>
                                <script src="js/jquery.ui.core.js"></script>
                                <script src="js/jquery.ui.widget.js"></script>
                                <title>Human Resource Management System</title>
                                <style type="text/css" rel="stylesheet">
                                    @import url("css/style.css");
                                </style>

                                <script>
                                    $(function() {
                                        $( "#dob" ).datepicker();
                                    });
                                </script>
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
                                </head>
                                <body>

                                    <div id="container">
                                        <div id="header"></div>
                                        <div id="links1" align="right" style="">
                                            <a href="viewRecruitments.php" target="_self" style="background-image: url('css/images/view_recruitment.png'); width: 150px; height: 35px; display: inline-block;"></a>&nbsp;&nbsp;
                                            <a href="viewRecruitmentResults.php" target="_self" style="background-image: url('css/images/recruitment_result.png'); width: 150px; height: 35px; display: inline-block;"></a>&nbsp;&nbsp;&nbsp;
                                            <a href="index.php" style="background-image: url('css/images/backToLogin.png'); width: 150px; height: 35px; display: inline-block;" title="Login as Client" target="_self"></a>&nbsp;&nbsp;
                                        </div>
                                        <div id="content">
                                            <h3 align="center"><u>Vacancy Recruitment</u></h3>
                                            <br />
                                            <?php
                                            $query = mysql_query("SELECT * FROM EmployeeRecruitment");
                                            if ($query) {
                                                $i = 0;
                                                while ($row = mysql_fetch_array($query)) {
                                                    $i++;
                                                    ?>
                                                   <table style="border: 1px solid #999;">
                                                        <tr>
                                                            <td colspan="2" style=" width: 750px; overflow: auto; padding: 10px; font-size: 14px; text-align: center; background-color: #3399ff; color: white;"><h3 align="center">Vacancy <?php echo $i; ?></h3></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="width: 250px; padding: 5px;border: 1px solid #e6e6e6;">Vacancy Code: </td>
                                                            <td align="center" style="padding: 5px;border: 1px solid #e6e6e6;"><?php echo $row['vacCode']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="padding: 5px;border: 1px solid #e6e6e6;">Vacancy Name: </td>
                                                            <td align="center" style="border: 1px solid #e6e6e6;"><?php echo $row['vacName']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="padding: 5px;border: 1px solid #e6e6e6;">Vacancy Department: </td>
                                                            <td align="center" style="padding: 5px;border: 1px solid #e6e6e6;"><?php echo $row['vacDepartment']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="padding: 5px;border: 1px solid #e6e6e6;">Vacancy Open Date: </td>
                                                            <td align="center" style="padding: 5px;border: 1px solid #e6e6e6;"><?php echo $row['openDate']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right"  style="padding: 5px;border: 1px solid #e6e6e6;">Vacancy Close Date: </td>
                                                            <td align="center" style="padding: 5px;border: 1px solid #e6e6e6;"><?php echo $row['closeDate']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="padding: 5px;border: 1px solid #e6e6e6;">Vacancy Required Number for Position: </td>
                                                            <td align="center" style="padding: 5px;border: 1px solid #e6e6e6;"><?php echo $row['requiredNumber']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right"  style="padding: 5px;border: 1px solid #e6e6e6;">Vacancy Salary: </td>
                                                            <td align="center" style="padding: 5px;border: 1px solid #e6e6e6;"><?php echo $row['salary']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="padding: 5px;border: 1px solid #e6e6e6;">Vacancy Detail: </td>
                                                            <td align="center" style="padding: 5px;border: 1px solid #e6e6e6;"><?php echo $row['detailVacancy']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="padding: 5px;border: 1px solid #e6e6e6;">Vacancy Recruitment Notice: </td>
                                                            <td align="center" style="padding: 5px;border: 1px solid #e6e6e6;"><?php echo $row['recruitmentNotice']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" align="right" style="padding: 5px;">
                                                                <a href="applicantForm.php?vacCode=<?php echo $row['vacCode']; ?>" target="_self" style="background-image: url('css/images/application_form.png'); width: 200px; height: 40px; display: inline-block;"></a>&nbsp;&nbsp;
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <br />
                                                    <?php
                                                }
                                            }
                                            ?>

                                        </div>
                                        <div id="footer">
                                            <br />
                                            <br />
                                            <p align="center">Copyright 2013 &copy; [ Hawassa Polytechnic College HRMS ] &middot; All Right Reserved &middot; <a href="#">PG Students Project</a></p>
                                        </div>
                                    </div>

                                </body>
                                </html>