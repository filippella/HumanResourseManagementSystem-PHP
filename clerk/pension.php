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
                                        $( "#dateNaissance" ).datepicker({
                                            onSelect:function(date){
                                                var today = new Date();       
                                                $('#txtage').val(DateDiff(today,new Date(date)));       
                                            }        
                                        });
                                    });
                                    $(function() {
                                        $( "#hiredDate" ).datepicker({
                                            onSelect:function(date){
                                                var today = new Date(); 
                                                var hireDate = new Date(date);
                                                var dd = DateDiff(today, hireDate)
                                                var age = $('#txtage').val();
                                                
                                                if(dd>=55) {
                                                    hireDate.setFullYear(hireDate.getFullYear() + 55);
                                                    $('#retiredDate').val($.datepicker.formatDate('dd/mm/yy', new Date(hireDate))); 
                                                }
                                                else {
                                                    var rd = age - dd;
                                                    var temp = 60 - rd;
                                                    hireDate.setFullYear(hireDate.getFullYear() + temp);
                                                    $('#retiredDate').val($.datepicker.formatDate('dd/mm/yy', new Date(hireDate))); 
                                                }
                                                
                                                      
                                            }        
                                        });
                                    });
                                    function DateDiff(date1,date2) {
                                        var val = (date1.getTime() - date2.getTime());
                                        var days = Math.round(val /1000 / 60 / 60 / 24);
                                        var years = Math.round(days /365);
                                        return years;
                                    }
                                    function digitsOnly(obj){
                                        obj.value=obj.value.replace(/[^\d]/g,'');
                                        var temp = (obj.value / 100) * 70;
                                        document.getElementById('retirementSalary').value = temp;
                                    }
                                    function checkTextFields() {
                                        if($('#empID').val() == "") {
                                            $('#em').text("*");
                                        }
                                        if($('#currentSalary').val() == "") {
                                            $('#c1').text("*");
                                        }
                                        if($('#txtage').val() == "") {
                                            $('#c2').text("*");
                                        }
                                        if($('#hiredDate').val() == "") {
                                            $('#c3').text("*");
                                        }
                                    }
                                </script>
                                <script>
                                    function validatePension() {
                                        var empID = document.getElementById('empID').value;
                                        var currentSalary = document.getElementById('currentSalary').value;
                                        var birthDate = document.getElementById('dateNaissance').value;
                                        var hireDate = document.getElementById('hiredDate').value;
                                        if((empID=="")||(currentSalary=="")||(birthDate=="")||(hireDate=="")) {
                                            if(empID=="") {
                                                document.getElementById('em').innerHTML = "*"; 
                                            }
                                            if(currentSalary=="") {
                                                document.getElementById('c1').innerHTML = "*"; 
                                            }
                                            if(birthDate=="") {
                                                document.getElementById('c2').innerHTML = "*"; 
                                            }
                                            if(hireDate=="") {
                                                document.getElementById('c3').innerHTML = "*"; 
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
                                            
                                            <h3 align="center"><u>Pension Management Module</u></h3>
                                            <br />

                                            <form action="savePension.php" method="post" onsubmit="return validatePension()">

                                                <table align="center" width="50%" style="padding: 5px; border: 1px dashed rgb(153,153,153);">
                                                    <tr>
                                                        <td align="right" style="padding: 5px; color: #663300;">Employee ID: </td>
                                                        <td align="left" style="padding: 5px;"><input type="text" name="empID" onfocus="document.getElementById('em').innerHTML = '';" id="empID" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /> <b style="color: red; font-size: 14px;" id="em"></b></td>
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
                                                        <td align="right" style="padding: 5px; color: #663300;">Current Salary: </td>
                                                        <td align="left" style="padding: 5px;"><input type="text" onkeyup="digitsOnly(this)" onfocus="document.getElementById('c1').innerHTML = '';" onblur="digitsOnly(this)" name="currentSalary" id="currentSalary" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" />  <b style="color: red; font-size: 14px;" id="c1"></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" style="padding: 5px; color: #663300;">Birth Date: </td>
                                                        <td align="left" style="padding: 5px;"><input type="text" onfocus="document.getElementById('c2').innerHTML = '';checkTextFields()" name="dob" id="dateNaissance" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /> <b style="color: red; font-size: 14px;" id="c2"></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" style="padding: 5px; color: #663300;">Age: </td>
                                                        <td align="left" style="padding: 5px;"><input type="text" readonly="readonly" name="age" id="txtage" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" style="padding: 5px; color: #663300;">Hired Date: </td>
                                                        <td align="left" style="padding: 5px;"><input type="text" onfocus="document.getElementById('c3').innerHTML = '';checkTextFields()" name="hiredDate" id="hiredDate" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /> <b style="color: red; font-size: 14px;" id="c3"></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" style="padding: 5px; color: #663300;">Retired Date: </td>
                                                        <td align="left" style="padding: 5px;"><input type="text" name="retiredDate" readonly="readonly" id="retiredDate" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" style="padding: 5px; color: #663300;">Retirement Salary: </td>
                                                        <td align="left" style="padding: 5px;"><input type="text" readonly="readonly" name="retirementSalary" id="retirementSalary" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
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
                                            <p align="left"><b style="color: red;"><u>Note</u>:</b> The employee get Retired at the age 60 or have service 55 year. Employee become 10 years service do not get pension cover</p>



                                        </div>
                                        <div id="footer">
                                            <br />
                                            <br />
                                            <p align="center">Copyright 2013 &copy; [ Hawassa Polytechnic College HRMS ] &middot; All Right Reserved &middot; <a href="#">PG Students Project</a></p>
                                        </div>
                                    </div>

                                </body>