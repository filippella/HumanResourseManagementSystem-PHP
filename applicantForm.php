<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('INCLUDE/MySqlDb.php');
$Db = new MysqlDB();

$vacCode = "";

if(isset ($_GET['vacCode'])) {
    $vacCode = $_GET['vacCode'];
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

                                            <h3 align="center"><u>Applicant Application Form</u></h3>
                                            <br />

                                            <form name="applicationForm"method="post" action="saveEmployeeApplicationForm.php">

                                                <table align="center" width="50%" style="padding: 5px; border: 1px solid rgb(153,153,153);">
                                                    <tr>
                                                        <td align="right" style="padding: 5px; color: #663300;">Vacancy Code: </td>
                                                        <td align="left" style="padding: 5px;"><input type="text" name="vacCode" value="<?php echo $vacCode;?>" readonly="readonly" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" style="padding: 5px; color: #663300;">Employee ID: </td>
                                                        <td align="left" style="padding: 5px;"><input type="text" name="empID" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" style="padding: 5px; color: #663300;">First Name: </td>
                                                        <td align="left" style="padding: 5px;"><input type="text" name="firstName" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" style="padding: 5px; color: #663300;">Last Name: </td>
                                                        <td align="left" style="padding: 5px;"><input type="text" name="lastName" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" style="padding: 5px; color: #663300;">Sex: </td>
                                                        <td align="left" style="padding: 5px;">
                                                            Male <input type="radio" name="gender" value="Male" checked="checked" style="border: 1px solid rgb(153,153,153);" /> &nbsp;&nbsp;&nbsp; 
                                                            Female <input type="radio" name="gender" value="Female" style="border: 1px solid rgb(153,153,153);" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" style="padding: 5px; color: #663300;">Date: </td>
                                                        <td align="left" style="padding: 5px;"><input type="text" id="date" name="date" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" style="padding: 5px; color: #663300;">GPA: </td>
                                                        <td align="left" style="padding: 5px;"><input type="text" name="gpa" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" style="padding: 5px; color: #663300;">Experience: </td>
                                                        <td align="left" style="padding: 5px;"><input type="text" name="experience" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" align="right" style="padding: 5px; color: #663300;" valign="top">
                                                            <input type="reset" style="background-image: url('css/images/reset.png'); width: 100px; height: 25px; display: inline-block;" value="" />&nbsp;&nbsp;&nbsp;

                                                            <input type="submit" style="background-image: url('css/images/apply.png'); width: 100px; height: 25px; display: inline-block;" value="" />

                                                        </td>
                                                    </tr>

                                                </table>

                                            </form>

                                        </div>
                                        <div id="footer">
                                            <br />
                                            <br />
                                            <p align="center">Copyright 2013 &copy; [ Hawassa Polytechnic College HRMS ] &middot; All Right Reserved &middot; <a href="#">PG Students Project</a></p>
                                        </div>
                                    </div>

                                </body>
                                </html>