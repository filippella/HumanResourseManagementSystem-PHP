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
                                    function checkEmployeeID(empID) {
                                
                                        $.post("CheckEmployee.php",{empID:empID},function(result){
                                            var temp = result.toString();
                                            
                                            $('#username_status').attr('src',temp);
                                        });
                                
                                    }    
                                </script>
                                <script>
                                    $(function() {
                                        $( "#employee_registration" ).accordion({
                                            heightStyle: "content"
                                        });
                                    });
                                </script>


                                <title>Human Resource Management System</title>
                                <style type="text/css" rel="stylesheet">
                                    @import url("../css/style.css");
                                </style>
                                <script>
                                    $(function() {
                                        $( "#dob" ).datepicker();
                                    });
                                </script>
                                <script>
                                    function validateRegister() {
                                
                                        var id = document.getElementById('empID').value;
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
                                            <a href="edit.php" target="_self" style="background-image: url('../css/images/edit.png'); width: 100px; height: 25px; display: inline-block;"></a>&nbsp;&nbsp;
                                            <a href="search.php" target="_self" style="background-image: url('../css/images/search.png'); width: 100px; height: 25px; display: inline-block;"></a>&nbsp;&nbsp;
                                            <a href="view.php" target="_self" style="background-image: url('../css/images/view.png'); width: 100px; height: 25px; display: inline-block;"></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                            </div>
                                        <div id="content">

                                            <h3 align="left">Employee Detail</h3>
                                            <form name="" action="registerEmployee.php" method="post" enctype="multipart/form-data" onsubmit="return validateRegister()">

                                                <table style="width: 100%;">
                                                    <tr>
                                                        <td align="center" valign="top">

                                                            <div id="employee_registration" style="font-size: 12px; font-family: 'Trebuchet MS', 'Arial', 'Helvetica', 'Verdana', 'sans-serif';">
                                                                <h3 align="left">General Information</h3>
                                                                <div style="height: auto;">
                                                                    <table align="center" width="70%" style="padding: 5px;">
                                                                        <tr>
                                                                            <td align="right" style="padding: 5px; color: #663300;">Employee ID Number: </td>
                                                                            <td align="left" style="padding: 5px;"><input type="text" name="empID" id="empID" onkeyup="checkEmployeeID(this.value)" onfocus="document.getElementById('c1').innerHTML = '';" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /> <img id="username_status" src="" width="20" height="20" /> <b style="color: red; font-size: 14px;" id="c1"></b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="right" style="padding: 5px; color: #663300;">Employee First Name: </td>
                                                                            <td align="left" style="padding: 5px;"><input type="text" name="fn" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /> <b style="color: red;" id="c"></b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="right" style="padding: 5px; color: #663300;">Employee Last Name: </td>
                                                                            <td align="left" style="padding: 5px;"><input type="text" name="ln" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /> <b style="color: red;" id="c"></b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="right" style="padding: 5px; color: #663300;">Employee Gender: </td>
                                                                            <td align="left" style="padding: 5px;">
                                                                                Male <input type="radio" name="gender" value="Male" checked="checked" style="border: 1px solid rgb(153,153,153);" /> &nbsp;&nbsp;&nbsp; 
                                                                                Female <input type="radio" name="gender" value="Female" style="border: 1px solid rgb(153,153,153);" />
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="right" style="padding: 5px; color: #663300;">Employee Photograph: </td>
                                                                            <td align="left" style="padding: 5px;"><input type="file" value="Browse" name="pic" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /> <b style="color: red;" id="c"></b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="right" style="padding: 5px; color: #663300;">Employee Vacancy Code: </td>
                                                                            <td align="left" style="padding: 5px;"><input type="text" name="vac_code" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /> <b style="color: red;" id="c"></b></td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <h3 align="left">Contact Information</h3>
                                                                <div style="height: auto;">
                                                                    <table align="center" width="70%" style="padding: 5px;">
                                                                        <tr>
                                                                            <td align="right" style="padding: 5px; color: #663300;">Employee Mobile Number: </td>
                                                                            <td align="left" style="padding: 5px;"><input type="text" name="mobNumber" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /> <b style="color: red;" id="c"></b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="right" style="padding: 5px; color: #663300;">Employee Telephone Number: </td>
                                                                            <td align="left" style="padding: 5px;"><input type="text" name="tn" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /> <b style="color: red;" id="c"></b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="right" style="padding: 5px; color: #663300;">Employee Contact Country: </td>
                                                                            <td align="left" style="padding: 5px;"><input type="text" name="cc" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /> <b style="color: red;" id="c"></b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="right" style="padding: 5px; color: #663300;">Employee Contact Town: </td>
                                                                            <td align="left" style="padding: 5px;"><input type="text" name="ct" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /> <b style="color: red;" id="c"></b></td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <h3 align="left">Address Information</h3>
                                                                <div style="height: auto;">
                                                                    <table align="center" width="80%" style="padding: 5px;">
                                                                        <tr>
                                                                            <td align="right" style="padding: 5px; color: #663300;">E-mail Address: </td>
                                                                            <td align="left" style="padding: 5px;"><input type="email" name="email" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /> <b style="color: red;" id="c"></b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="right" style="padding: 5px; color: #663300;">Region: </td>
                                                                            <td align="left" style="padding: 5px;"><input type="text" name="region" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /> <b style="color: red;" id="c"></b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="right" style="padding: 5px; color: #663300;">Sub City: </td>
                                                                            <td align="left" style="padding: 5px;"><input type="text" name="subcity" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /> <b style="color: red;" id="c"></b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="right" style="padding: 5px; color: #663300;">Woreda: </td>
                                                                            <td align="left" style="padding: 5px;"><input type="text" name="woreda" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /> <b style="color: red;" id="c"></b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="right" style="padding: 5px; color: #663300;">Kebele: </td>
                                                                            <td align="left" style="padding: 5px;"><input type="text" name="kebele" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /> <b style="color: red;" id="c"></b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="right" style="padding: 5px; color: #663300;">House Number: </td>
                                                                            <td align="left" style="padding: 5px;"><input type="text" name="hn" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /> <b style="color: red;" id="c"></b></td>
                                                                        </tr>
                                                                    </table>
                                                                </div style="height: auto;">
                                                                <h3 align="left">Personal Information</h3>
                                                                <div>
                                                                    <table align="center" width="80%" style="padding: 5px;">
                                                                        <tr>
                                                                            <td align="right" style="padding: 5px; color: #663300;">Date of Birth: </td>
                                                                            <td align="left" style="padding: 5px;"><input type="text" name="dob" id="dob" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /> <b style="color: red;" id="c"></b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="right" style="padding: 5px; color: #663300;">Marital Status: </td>
                                                                            <td align="left" style="padding: 5px;">
                                                                                <select name="ms" size="1"  style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);">
                                                                                    <option value="Single">Single</option>
                                                                                    <option value="Married">Married</option>
                                                                                    <option value="Divorced">Divorced</option>
                                                                                    <option value="Widowed">Widowed</option>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="right" style="padding: 5px; color: #663300;">Mother Name: </td>
                                                                            <td align="left" style="padding: 5px;"><input type="text" name="motherName" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /> <b style="color: red;" id="c"></b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="right" style="padding: 5px; color: #663300;">Number of Son: </td>
                                                                            <td align="left" style="padding: 5px;"><input type="text" name="nos" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /> <b style="color: red;" id="c"></b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="right" style="padding: 5px; color: #663300;">Number of Daughter: </td>
                                                                            <td align="left" style="padding: 5px;"><input type="text" name="nod" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /> <b style="color: red;" id="c"></b></td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <h3 align="left">Employment Information</h3>
                                                                <div style="height: auto;">
                                                                    <table align="center" width="100%" style="padding: 5px;">
                                                                        <tr>
                                                                            <td align="center" width="50%">
                                                                                <table align="center">
                                                                                    <tr>
                                                                                        <td align="right" style="padding: 5px; color: #663300;">Employment Date: </td>
                                                                                        <td align="left" style="padding: 5px;"><input type="text" name="empDate" style="width: 200px; padding: 5px; border: 1px solid rgb(153,153,153);" /> <b style="color: red;" id="c"></b></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right" style="padding: 5px; color: #663300;">Employment Job Title: </td>
                                                                                        <td align="left" style="padding: 5px;"><input type="text" name="empJobTitle" style="width: 200px; padding: 5px; border: 1px solid rgb(153,153,153);" /> <b style="color: red;" id="c"></b></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right" style="padding: 5px; color: #663300;">Starting Salary: </td>
                                                                                        <td align="left" style="padding: 5px;"><input type="text" name="startingSalary" style="width: 200px; padding: 5px; border: 1px solid rgb(153,153,153);" /> <b style="color: red;" id="c"></b></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right" style="padding: 5px; color: #663300;">Current Salary: </td>
                                                                                        <td align="left" style="padding: 5px;"><input type="text" name="currentSalary" style="width: 200px; padding: 5px; border: 1px solid rgb(153,153,153);" /> <b style="color: red;" id="c"></b></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right" style="padding: 5px; color: #663300;">Pension Identity Number: </td>
                                                                                        <td align="left" style="padding: 5px;"><input type="text" name="pensionIdentityNumber" style="width: 200px; padding: 5px; border: 1px solid rgb(153,153,153);" /> <b style="color: red;" id="c"></b></td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            <td align="center" width="50%">
                                                                                <table align="center">
                                                                                    <tr>
                                                                                        <td align="right" style="padding: 5px; color: #663300;">(TIN) Number: </td>
                                                                                        <td align="left" style="padding: 5px;"><input type="text" name="tinNumber" style="width: 200px; padding: 5px; border: 1px solid rgb(153,153,153);" /> <b style="color: red;" id="c"></b></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right" style="padding: 5px; color: #663300;">Department: </td>
                                                                                        <td align="left" style="padding: 5px;"><input type="text" name="department" style="width: 200px; padding: 5px; border: 1px solid rgb(153,153,153);" /> <b style="color: red;" id="c"></b></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right" style="padding: 5px; color: #663300;">Membership: </td>
                                                                                        <td align="left" style="padding: 5px;"><input type="text" name="membership" style="width: 200px; padding: 5px; border: 1px solid rgb(153,153,153);" /> <b style="color: red;" id="c"></b></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right" style="padding: 5px; color: #663300;">Job Status: </td>
                                                                                        <td align="left" style="padding: 5px;">
                                                                                            <select name="jobStatus" size="1"  style="width: 200px; padding: 5px; border: 1px solid rgb(153,153,153);">
                                                                                                <option value="Contract">Contract</option>
                                                                                                <option value="Permanent">Permanent</option>
                                                                                            </select>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right" style="padding: 5px; color: #663300;">Status: </td>
                                                                                        <td align="left" style="padding: 5px;">
                                                                                            <select name="emp_status" size="1"  style="width: 200px; padding: 5px; border: 1px solid rgb(153,153,153);">
                                                                                                <option value="Active">Active</option>
                                                                                                <option value="Dead">Dead</option>
                                                                                                <option value="Transfer">Transfer</option>
                                                                                                <option value="Retired">Retired</option>
                                                                                                <option value="Terminate">Terminate</option>
                                                                                                <option value="Departed">Departed</option>
                                                                                            </select>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>


                                                                    </table>
                                                                </div>
                                                                <h3 align="left">Emergency Contact Information</h3>
                                                                <div style="height: auto;">
                                                                    <table align="center" width="100%" style="padding: 5px;">
                                                                        <tr>
                                                                            <td align="center" width="50%">
                                                                                <table align="center">
                                                                                    <tr>
                                                                                        <td align="right" style="padding: 5px; color: #663300;">First Name: </td>
                                                                                        <td align="left" style="padding: 5px;"><input type="text" name="emFn" style="width: 200px; padding: 5px; border: 1px solid rgb(153,153,153);" /> <b style="color: red;" id="c"></b></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right" style="padding: 5px; color: #663300;">Last Name: </td>
                                                                                        <td align="left" style="padding: 5px;"><input type="text" name="emLn" style="width: 200px; padding: 5px; border: 1px solid rgb(153,153,153);" /> <b style="color: red;" id="c"></b></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right" style="padding: 5px; color: #663300;">Mobile Number: </td>
                                                                                        <td align="left" style="padding: 5px;"><input type="text" name="emMob" style="width: 200px; padding: 5px; border: 1px solid rgb(153,153,153);" /> <b style="color: red;" id="c"></b></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right" style="padding: 5px; color: #663300;">Telephone Number: </td>
                                                                                        <td align="left" style="padding: 5px;"><input type="text" name="emTel" style="width: 200px; padding: 5px; border: 1px solid rgb(153,153,153);" /> <b style="color: red;" id="c"></b></td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            <td align="center" width="50%">
                                                                                <table align="center">
                                                                                    <tr>
                                                                                        <td align="right" style="padding: 5px; color: #663300;">Country: </td>
                                                                                        <td align="left" style="padding: 5px;"><input type="text" name="emCountry" style="width: 200px; padding: 5px; border: 1px solid rgb(153,153,153);" /> <b style="color: red;" id="c"></b></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right" style="padding: 5px; color: #663300;">Region: </td>
                                                                                        <td align="left" style="padding: 5px;"><input type="text" name="emRegion" style="width: 200px; padding: 5px; border: 1px solid rgb(153,153,153);" /> <b style="color: red;" id="c"></b></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right" style="padding: 5px; color: #663300;">Town: </td>
                                                                                        <td align="left" style="padding: 5px;"><input type="text" name="emTown" style="width: 200px; padding: 5px; border: 1px solid rgb(153,153,153);" /> <b style="color: red;" id="c"></b></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right" style="padding: 5px; color: #663300;">Kebele: </td>
                                                                                        <td align="left" style="padding: 5px;"><input type="text" name="emKebele" style="width: 200px; padding: 5px; border: 1px solid rgb(153,153,153);" /> <b style="color: red;" id="c"></b></td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>


                                                                    </table>
                                                                </div>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </table>


                                                <br />

                                                <p align="right">
                                                    <input type="reset" value="" style="background: transparent; background-image: url('../css/images/reset.png'); width: 100px; height: 25px; display: inline-block;" />&nbsp;&nbsp;
                                                    <input type="submit" value="" style="background: transparent; background-image: url('../css/images/save.png'); width: 100px; height: 25px; display: inline-block;" />
                                                </p>



                                            </form>




                                        </div>
                                        <div id="footer">
                                            <br />
                                            <br />
                                            <p align="center">Copyright 2013 &copy; [ Hawassa Polytechnic College HRMS ] &middot; All Right Reserved &middot; <a href="#">PG Students Project</a></p>
                                        </div>
                                    </div>

                                </body>