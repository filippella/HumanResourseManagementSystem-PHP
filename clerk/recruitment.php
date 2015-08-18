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
                                <link rel="stylesheet" href="../css/themes/base/jquery.ui.all.css" />
                                <script src="../js/jquery-1.9.1.js"></script>
                                <script src="../js/jquery.ui.core.js"></script>
                                <script src="../js/jquery.ui.widget.js"></script>

                                <script src="../js/jquery.ui.accordion.js"></script>
                                <script src="../js/jquery.ui.autocomplete.js"></script>
                                <script src="../js/jquery.ui.menu.js"></script>
                                <script src="../js/jquery.ui.position.js"></script>
                                <script src="../js/jquery.ui.datepicker.js"></script>

                                <link rel="stylesheet" href="../demos.css" />
                                <script>
                                    function checkVac(vacID) {
                                
                                        $.post("CheckVacancyCode.php",{vacID:vacID},function(result){
                                            var temp = result.toString();
                                            
                                            $('#vac_status').attr('src',temp);
                                        });
                                
                                    }    
                                </script>
                                <script>
                                    $(function() {
                                        $( "#openDate" ).datepicker();
                                    });
                                    $(function() {
                                        $( "#closeDate" ).datepicker();
                                    });
                                </script>
                                <script>
                                    function validatePost() {
                                        var id = document.getElementById('vacCode').value;
                                        if(id=="") {
                                            document.getElementById('c1').innerHTML = "*";
                                            return false;
                                        }
                                        return true;
                                    }    
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
                                            <a href="search.php" target="_self" style="background-image: url('../css/images/search.png'); width: 100px; height: 25px; display: inline-block;"></a>&nbsp;&nbsp;
                                            <a href="view.php" target="_self" style="background-image: url('../css/images/view.png'); width: 100px; height: 25px; display: inline-block;"></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                            </div>
                                        <div id="content">
                                            <div align="right" style="width: 100%;">
                                                <form action="#" method="post">
                                                    <input type="text" style="padding: 5px; border: 1px solid rgb(153,153,153); background:url('../css/images/searchImg.png') no-repeat 100% 50%" name="q" size="31" />
                                                    <input type="submit" name="sa" value="Search" style="height: 25px;border: 1px solid #3399ff; border-radius: 5px;" />
                                                </form>
                                            </div>

                                            <h3 align="center"><u>Recruitment Module</u></h3>
                                            <br />

                                            <form action="saveVacancy.php" method="post" onsubmit="return validatePost()">

                                                <table align="center" width="60%" style="padding: 5px; border: 1px solid rgb(153,153,153);">
                                                    <tr>
                                                        <td align="right" style="padding: 5px; color: #663300;">Vacancy Code: </td>
                                                        <td align="left" style="padding: 5px;"><input type="text" onfocus="document.getElementById('c1').innerHTML = '';" name="vacCode" id="vacCode" onkeyup="checkVac(this.value)" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /> <img id="vac_status" src="" width="20" height="20" />  <b style="color: red; font-size: 14px;" id="c1"></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" style="padding: 5px; color: #663300;">Vacancy Name: </td>
                                                        <td align="left" style="padding: 5px;"><input type="text" name="vacName" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" style="padding: 5px; color: #663300;">Vacancy Department: </td>
                                                        <td align="left" style="padding: 5px;"><input type="text" name="vacDepartment" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" style="padding: 5px; color: #663300;">Open Date: </td>
                                                        <td align="left" style="padding: 5px;"><input type="text" name="openDate" id="openDate" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" style="padding: 5px; color: #663300;">Close Date: </td>
                                                        <td align="left" style="padding: 5px;"><input type="text" name="closeDate" id="closeDate" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" style="padding: 5px; color: #663300;">Required Number for Position: </td>
                                                        <td align="left" style="padding: 5px;"><input type="text" name="requiredNumber" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" style="padding: 5px; color: #663300;">Salary: </td>
                                                        <td align="left" style="padding: 5px;"><input type="text" name="salary" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" style="padding: 5px; color: #663300;" valign="top">Detail Vacancy: </td>
                                                        <td align="left" style="padding: 5px;">
                                                            <textarea name="detailVacancy" style="width: 300px; height: 100px; overflow: auto; padding: 5px; border: 1px solid rgb(153,153,153);"></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" style="padding: 5px; color: #663300;" valign="top">Recruitment Notice: </td>
                                                        <td align="left" style="padding: 5px;">
                                                            <textarea name="recruitmentNotice" style="width: 300px; height: 100px; overflow: auto; padding: 5px; border: 1px solid rgb(153,153,153);"></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" align="right" style="padding: 5px; color: #663300;" valign="top">
                                                            <input type="reset" style="background-image: url('../css/images/reset.png'); width: 100px; height: 25px; display: inline-block;" value="" />&nbsp;&nbsp;&nbsp;

                                                            <input type="submit" style="background-image: url('../css/images/post.png'); width: 100px; height: 25px; display: inline-block;" value="" />

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