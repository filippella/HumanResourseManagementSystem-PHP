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
                                <script src="../js/jquery.ui.datepicker.js"></script>
                                <script language="javascript" type="text/javascript">
                                    function validateAppraisal() {
                                        var empID = document.getElementById('empID').value;
                                        if(empID=="") {
                                            document.getElementById('em').innerHTML = "*"; 
                                            return false;
                                        }  
                                        return true;
                                    }
                                </script>
                                <script>
                                    function test(v) {
                                        if(v==1){
                                            document.getElementById('tt').innerHTML = "<table><tr><td align='right' style='padding: 5px; color: #663300;'>Academic Evaluation (50%): </td><td align='left' style='padding: 5px;'><input type='text' onkeyup='addTot()' id='academicEvaluation' name='academicEvaluation' style='width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);' /></td></tr><tr><td align='right' style='padding: 5px; color: #663300;'>Technology Transfer (25%): </td><td align='left' style='padding: 5px;'><input type='text' onkeyup='addTot()' id='technologyTransfer' name='technologyTransfer' style='width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);' /></td></tr><tr><td align='right' style='padding: 5px; color: #663300;'>Industrial Extension (25%): </td><td align='left' style='padding: 5px;'><input type='text' onkeyup='addTot()' id='industrialExtension' name='industrialExtension' style='width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);' /></td></tr></table> ";
                       
                                        }
                                        else {
                                            document.getElementById('tt').innerHTML = "<table><tr><td align='right' style='padding: 5px; color: #663300;'>Finance Department (50%): </td><td align='left' style='padding: 5px;'><input type='text' onkeyup='addTot2()' id='financeDepartment' name='financeDepartment' style='width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);' /></td></tr><tr><td align='right' style='padding: 5px; color: #663300;'>HRM Department (50%): </td><td align='left' style='padding: 5px;'><input type='text' onkeyup='addTot2()' id='hrmDepartment' name='hrmDepartment' style='width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);' /></td></tr></table>"
                                        }
                                
                                                                 
                                    }    
                                </script>
                                <script>
                                    $(function() {
                                        $( "#dob1" ).datepicker();
                                        $( "#dob2" ).datepicker();
                                    });
                                </script>
                                <script>
                                    function addTot() {
                                        var v1 = document.getElementById('industrialExtension').value;
                                        var v2 = document.getElementById('technologyTransfer').value;
                                        var v3 = document.getElementById('academicEvaluation').value;
                                  
                                        var r1 = getNumber(v1);
                                        var r2 = getNumber(v2);
                                        var r3 = getNumber(v3);
                                        
                                        var totSum = r1 + r2 + r3;
                                        document.getElementById('totalScore').value = totSum;                              
                                
                                
                                    }
                                    function addTot2() {
                                        var v1 = document.getElementById('financeDepartment').value;
                                        var v2 = document.getElementById('hrmDepartment').value;
                                  
                                        var r1 = getNumber(v1);
                                        var r2 = getNumber(v2);
                                        
                                        var totSum = r1 + r2;
                                        document.getElementById('totalScore').value = totSum;                              
                                
                                
                                    }
                                    function getNumber(str) {
                                        return isNaN(str)|| str==null?0:Number(str);
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

                                            <h3 align="center"><u>Appraisal Management Module</u></h3>
                                            <br />

                                            <form action="saveAppraisal.php" method="post" onsubmit="return validateAppraisal()">

                                                <table align="center" width="50%" style="padding: 5px; border: 1px dashed rgb(153,153,153);">
                                                    <tr>
                                                        <td align="right" style="padding: 5px; color: #663300;">Employee ID: </td>
                                                        <td align="left" style="padding: 5px;"><input type="text" name="empID" onfocus="document.getElementById('em').innerHTML = '';" id="empID" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /> <b style="color: red; font-size: 14px;" id="em"></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" style="padding: 5px; color: #663300;">Academic Year: </td>
                                                        <td align="left" style="padding: 5px;"><input type="text" name="academicYear" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" style="padding: 5px; color: #663300;">Duration: </td>
                                                        <td align="left" style="padding: 5px;">
                                                            From: <input type="text" name="durationFrom" id="dob1" style="width: 110px; padding: 5px; border: 1px solid rgb(153,153,153);" />
                                                            To: <input type="text" name="durationTo" id="dob2" style="width: 110px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                    </tr>     

                                                    <tr>
                                                        <td align="right" style="padding: 5px; color: #663300;">Staff Type: </td>
                                                        <td align="left" style="padding: 5px;">
                                                            <select name="staffType" size="1" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" onchange="test(this.value);">
                                                                <option value="1">Academic</option>
                                                                <option value="0">Non-Academic</option>
                                                            </select>
                                                        </td>    
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" id="tt">
                                                            <table>
                                                                <tr>
                                                                    <td align='right' style='padding: 5px; color: #663300;'>Academic Evaluation (50%): </td>
                                                                    <td align='left' style='padding: 5px;'>
                                                                        <input type='text' onkeyup="addTot()" id="academicEvaluation" name='academicEvaluation' style='width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);' />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align='right' style='padding: 5px; color: #663300;'>Technology Transfer (25%): </td>
                                                                    <td align='left' style='padding: 5px;'>
                                                                        <input type='text' onkeyup="addTot()" id="technologyTransfer" name='technologyTransfer' style='width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);' />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align='right' style='padding: 5px; color: #663300;'>Industrial Extension (25%): </td>
                                                                    <td align='left' style='padding: 5px;'>
                                                                        <input type='text' onkeyup='addTot()' id="industrialExtension" name='industrialExtension' style='width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);' />
                                                                    </td>
                                                                </tr>
                                                            </table> 

                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td align="right" style="padding: 5px; color: #663300;">Total Score (100%): </td>
                                                        <td align="left" style="padding: 5px;"><input type="text" id="totalScore" name="totalScore" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" style="padding: 5px; color: #663300;">Evaluated By: </td>
                                                        <td align="left" style="padding: 5px;"><input type="text" name="evaluatedBy" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" style="padding: 5px; color: #663300;">Current Carrier Status: </td>
                                                        <td align="left" style="padding: 5px;"><input type="text" name="carrierStatus" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" style="padding: 5px; color: #663300;">Year: </td>
                                                        <td align="left" style="padding: 5px;"><input type="text" name="year" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" align="right" style="padding: 5px; color: #663300;" valign="top">
                                                            <input type="reset" style="background-image: url('../css/images/reset.png'); width: 100px; height: 25px; display: inline-block;" value="" />&nbsp;&nbsp;&nbsp;

                                                            <input type="submit" style="background-image: url('../css/images/save.png'); width: 100px; height: 25px; display: inline-block;" value="" />

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