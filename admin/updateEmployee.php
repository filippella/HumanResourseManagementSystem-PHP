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

$empID = $_POST['empID'];

$qw1 = mysql_query("SELECT * FROM  `employeegeneralinformation` where empID = '$empID'");
$qw2 = mysql_query("SELECT * FROM  `employeecontactinformation` where empID = '$empID'");
$qw3 = mysql_query("SELECT * FROM  `employeeaddressinformation` where empID = '$empID'");
$qw4 = mysql_query("SELECT * FROM  `employeepersonalinformation` where empID = '$empID'");
$qw5 = mysql_query("SELECT * FROM  `employeeemploymentinformation` where empID = '$empID'");
$qw6 = mysql_query("SELECT * FROM  `employeeemergencycontactinformation` where empID = '$empID'");

$binary_data = "";

$row1 = "";
if ($qw1) {
    if (mysql_num_rows($qw1) < 1) {
        header("location: employeeNotFound.php");
        exit;
    }
    $row1 = mysql_fetch_array($qw1);
    $en = base64_encode($row1['empImageData']);
    $mime = 'image/png';
    $binary_data = 'data:' . $mime . ';base64,' . $en;
} else {
    die(mysql_error());
}

$row2 = "";
if ($qw2) {
    $row2 = mysql_fetch_array($qw2);
} else {
    die(mysql_error());
}

$row3 = "";
if ($qw3) {
    $row3 = mysql_fetch_array($qw3);
} else {
    die(mysql_error());
}

$row4 = "";
if ($qw4) {
    $row4 = mysql_fetch_array($qw4);
} else {
    die(mysql_error());
}
$row5 = "";
if ($qw5) {
    $row5 = mysql_fetch_array($qw5);
} else {
    die(mysql_error());
}
$row6 = "";
if ($qw6) {
    $row6 = mysql_fetch_array($qw6);
} else {
    die(mysql_error());
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
                                            <a href="delete.php" target="_self" style="background-image: url('../css/images/delete.png'); width: 100px; height: 25px; display: inline-block;"></a>&nbsp;&nbsp;
                                            <a href="search.php" target="_self" style="background-image: url('../css/images/search.png'); width: 100px; height: 25px; display: inline-block;"></a>&nbsp;&nbsp;
                                            <a href="view.php" target="_self" style="background-image: url('../css/images/view.png'); width: 100px; height: 25px; display: inline-block;"></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="control.php" target="_self" style="background-image: url('../css/images/control.png'); width: 150px; height: 25px; display: inline-block;"></a>
                                        </div>
                                        <div id="content">

                                            <form name="" action="saveUpdateEmployee.php" method="post" enctype="multipart/form-data">

                                                <table style="width: 100%;">
                                                    <tr>
                                                        <td align="center" valign="top">

                                                            <div id="employee_registration" style="font-size: 12px; font-family: 'Trebuchet MS', 'Arial', 'Helvetica', 'Verdana', 'sans-serif';">
                                                                <h3 align="left">General Information</h3>
                                                                <div style="height: auto;">
                                                                    <table align="center" width="80%">
                                                                        <tr>
                                                                            <td align="center">
                                                                                <table align="center" style="padding: 5px;">
                                                                                    <tr>
                                                                                        <td align="right" style="padding: 5px; color: #663300;">Employee ID Number: </td>
                                                                                        <td align="left" style="padding: 5px;"><input type="text" name="empID" value="<?php echo $row1['empID']; ?>" readonly="readonly" onkeyup="checkEmployeeID(this.value)" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /> <img id="username_status" src="" width="20" height="20" /></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right" style="padding: 5px; color: #663300;">Employee First Name: </td>
                                                                                        <td align="left" style="padding: 5px;"><input type="text" name="fn" value="<?php echo $row1['firstName']; ?>" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right" style="padding: 5px; color: #663300;">Employee Last Name: </td>
                                                                                        <td align="left" style="padding: 5px;"><input type="text" name="ln" value="<?php echo $row1['lastName']; ?>" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right" style="padding: 5px; color: #663300;">Employee Gender: </td>
                                                                                        <td align="left" style="padding: 5px;">
                                                                                            Male <input type="radio" name="gender" value="Male" <?php
if ($row1['gender'] == "Male") {
    echo "checked='checked'";
}
?> style="border: 1px solid rgb(153,153,153);" /> &nbsp;&nbsp;&nbsp; 
                                                                                            Female <input type="radio" name="gender" value="Female"  <?php
                                                                                                        if ($row1['gender'] == "Female") {
                                                                                                            echo "checked='checked'";
                                                                                                        }
?>  style="border: 1px solid rgb(153,153,153);" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right" style="padding: 5px; color: #663300;">Employee Photograph: </td>
                                                                                        <td align="left" style="padding: 5px;"><input type="file" value="Browse" name="pic" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right" style="padding: 5px; color: #663300;">Employee Vacancy Code: </td>
                                                                                        <td align="left" style="padding: 5px;"><input type="text" value="<?php echo $row1['vacCode']; ?>" name="vac_code" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            <td valign="middle" align="center">
                                                                                <img src="<?php echo $binary_data; ?>" width="200" height="200" /> 
                                                                            </td>
                                                                        </tr>
                                                                    </table>

                                                                </div>
                                                                <h3 align="left">Contact Information</h3>
                                                                <div style="height: auto;">
                                                                    <table align="center" width="70%" style="padding: 5px;">
                                                                        <tr>
                                                                            <td align="right" style="padding: 5px; color: #663300;">Employee Mobile Number: </td>
                                                                            <td align="left" style="padding: 5px;"><input type="text" name="mobNumber" value="<?php echo $row2['mobileNumber']; ?>" onkeyup="checkEmployeeID(this.value)" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="right" style="padding: 5px; color: #663300;">Employee Telephone Number: </td>
                                                                            <td align="left" style="padding: 5px;"><input type="text" name="tn" value="<?php echo $row2['telephoneNumber']; ?>" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="right" style="padding: 5px; color: #663300;">Employee Contact Country: </td>
                                                                            <td align="left" style="padding: 5px;"><input type="text" name="cc" value="<?php echo $row2['country']; ?>" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="right" style="padding: 5px; color: #663300;">Employee Contact Town: </td>
                                                                            <td align="left" style="padding: 5px;"><input type="text" name="ct" value="<?php echo $row2['town']; ?>" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <h3 align="left">Address Information</h3>
                                                                <div style="height: auto;">
                                                                    <table align="center" width="80%" style="padding: 5px;">
                                                                        <tr>
                                                                            <td align="right" style="padding: 5px; color: #663300;">E-mail Address: </td>
                                                                            <td align="left" style="padding: 5px;"><input type="email" name="email" value="<?php echo $row3['email']; ?>" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="right" style="padding: 5px; color: #663300;">Region: </td>
                                                                            <td align="left" style="padding: 5px;"><input type="text" name="region" value="<?php echo $row3['region']; ?>" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="right" style="padding: 5px; color: #663300;">Sub City: </td>
                                                                            <td align="left" style="padding: 5px;"><input type="text" name="subcity" value="<?php echo $row3['subcity']; ?>" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="right" style="padding: 5px; color: #663300;">Woreda: </td>
                                                                            <td align="left" style="padding: 5px;"><input type="text" name="woreda" value="<?php echo $row3['woreda']; ?>" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="right" style="padding: 5px; color: #663300;">Kebele: </td>
                                                                            <td align="left" style="padding: 5px;"><input type="text" name="kebele" value="<?php echo $row3['kebele']; ?>" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="right" style="padding: 5px; color: #663300;">House Number: </td>
                                                                            <td align="left" style="padding: 5px;"><input type="text" name="hn" value="<?php echo $row3['houseNumber']; ?>" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <h3 align="left">Personal Information</h3>
                                                                <div style="height: auto;">
                                                                    <table align="center" width="80%" style="padding: 5px;">
                                                                        <tr>
                                                                            <td align="right" style="padding: 5px; color: #663300;">Date of Birth: </td>
                                                                            <td align="left" style="padding: 5px;"><input type="text" value="<?php echo $row4['dateOfBirth']; ?>" name="dob" id="dob" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="right" style="padding: 5px; color: #663300;">Marital Status: </td>
                                                                            <td align="left" style="padding: 5px;">
                                                                                <select name="ms" size="1"  style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);">
                                                                                    <option value="Single" <?php
                                                                                                          if ($row4['maritalStatus'] == "Single") {
                                                                                                              echo " selected='selected'";
                                                                                                          }
?>>Single</option>
                                                                                    <option value="Married" <?php
                                                                                            if ($row4['maritalStatus'] == "Married") {
                                                                                                echo " selected='selected'";
                                                                                            }
?>>Married</option>
                                                                                    <option value="Divorced" <?php
                                                                                            if ($row4['maritalStatus'] == "Divorced") {
                                                                                                echo " selected='selected'";
                                                                                            }
?>>Divorced</option>
                                                                                    <option value="Widowed" <?php
                                                                                            if ($row4['maritalStatus'] == "Widowed") {
                                                                                                echo " selected='selected'";
                                                                                            }
?>>Widowed</option>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="right" style="padding: 5px; color: #663300;">Mother Name: </td>
                                                                            <td align="left" style="padding: 5px;"><input type="text" name="motherName" value="<?php echo $row4['motherName']; ?>" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="right" style="padding: 5px; color: #663300;">Number of Son: </td>
                                                                            <td align="left" style="padding: 5px;"><input type="text" name="nos" value="<?php echo $row4['numberOfSon']; ?>" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="right" style="padding: 5px; color: #663300;">Number of Daughter: </td>
                                                                            <td align="left" style="padding: 5px;"><input type="text" name="nod" value="<?php echo $row4['numberOfDaughter']; ?>" style="width: 300px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
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
                                                                                        <td align="left" style="padding: 5px;"><input type="text" value="<?php echo $row5['employmentDate']; ?>" name="empDate" style="width: 200px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right" style="padding: 5px; color: #663300;">Employment Job Title: </td>
                                                                                        <td align="left" style="padding: 5px;"><input type="text" value="<?php echo $row5['employeeJobTitle']; ?>" name="empJobTitle" style="width: 200px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right" style="padding: 5px; color: #663300;">Starting Salary: </td>
                                                                                        <td align="left" style="padding: 5px;"><input type="text" value="<?php echo $row5['startingSalary']; ?>" name="startingSalary" style="width: 200px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right" style="padding: 5px; color: #663300;">Current Salary: </td>
                                                                                        <td align="left" style="padding: 5px;"><input type="text" value="<?php echo $row5['currentSalary']; ?>" name="currentSalary" style="width: 200px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right" style="padding: 5px; color: #663300;">Pension Identity Number: </td>
                                                                                        <td align="left" style="padding: 5px;"><input type="text" value="<?php echo $row5['pensionIdentityNumber']; ?>" name="pensionIdentityNumber" style="width: 200px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            <td align="center" width="50%">
                                                                                <table align="center">
                                                                                    <tr>
                                                                                        <td align="right" style="padding: 5px; color: #663300;">(TIN) Number: </td>
                                                                                        <td align="left" style="padding: 5px;"><input type="text" value="<?php echo $row5['tinNumber']; ?>" name="tinNumber" style="width: 200px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right" style="padding: 5px; color: #663300;">Department: </td>
                                                                                        <td align="left" style="padding: 5px;"><input type="text" value="<?php echo $row5['employmentDate']; ?>" name="department" style="width: 200px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right" style="padding: 5px; color: #663300;">Membership: </td>
                                                                                        <td align="left" style="padding: 5px;"><input type="text" value="<?php echo $row5['employmentDate']; ?>" name="membership" style="width: 200px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right" style="padding: 5px; color: #663300;">Job Status: </td>
                                                                                        <td align="left" style="padding: 5px;">
                                                                                            <select name="jobStatus" size="1"  style="width: 200px; padding: 5px; border: 1px solid rgb(153,153,153);">
                                                                                                <option value="Contract" <?php
                                                                                            if ($row5['jobStatus'] == "Contract") {
                                                                                                echo " selected='selected'";
                                                                                            }
?>>Contract</option>
                                                                                                <option value="Permanent" <?php
                                                                                                        if ($row5['jobStatus'] == "Permanent") {
                                                                                                            echo " selected='selected'";
                                                                                                        }
?>>Permanent</option>
                                                                                            </select>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right" style="padding: 5px; color: #663300;">Status: </td>
                                                                                        <td align="left" style="padding: 5px;">
                                                                                            <select name="emp_status" size="1"  style="width: 200px; padding: 5px; border: 1px solid rgb(153,153,153);">
                                                                                                <option value="Active" <?php
                                                                                                        if ($row5['status'] == "Active") {
                                                                                                            echo " selected='selected'";
                                                                                                        }
?>
                                                                                                        >Active</option>
                                                                                                <option value="Dead" <?php
                                                                                                if ($row5['status'] == "Dead") {
                                                                                                    echo " selected='selected'";
                                                                                                }
?>>Dead</option>
                                                                                                <option value="Transfer" <?php
                                                                                                        if ($row5['status'] == "Transfer") {
                                                                                                            echo " selected='selected'";
                                                                                                        }
?>>Transfer</option>
                                                                                                <option value="Retired" <?php
                                                                                                        if ($row5['status'] == "Retired") {
                                                                                                            echo " selected='selected'";
                                                                                                        }
?>>Retired</option>
                                                                                                <option value="Terminate" <?php
                                                                                                        if ($row5['status'] == "Terminate") {
                                                                                                            echo " selected='selected'";
                                                                                                        }
?>>Terminate</option>
                                                                                                <option value="Departed" <?php
                                                                                                        if ($row5['status'] == "Departed") {
                                                                                                            echo " selected='selected'";
                                                                                                        }
?>>Departed</option>
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
                                                                                        <td align="left" style="padding: 5px;"><input type="text" value="<?php echo $row6['firstName']; ?>" name="emFn" style="width: 200px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right" style="padding: 5px; color: #663300;">Last Name: </td>
                                                                                        <td align="left" style="padding: 5px;"><input type="text" value="<?php echo $row6['lastName']; ?>" name="emLn" style="width: 200px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right" style="padding: 5px; color: #663300;">Mobile Number: </td>
                                                                                        <td align="left" style="padding: 5px;"><input type="text" value="<?php echo $row6['mobileNumber']; ?>" name="emMob" style="width: 200px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right" style="padding: 5px; color: #663300;">Telephone Number: </td>
                                                                                        <td align="left" style="padding: 5px;"><input type="text" value="<?php echo $row6['telNumber']; ?>" name="emTel" style="width: 200px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            <td align="center" width="50%">
                                                                                <table align="center">
                                                                                    <tr>
                                                                                        <td align="right" style="padding: 5px; color: #663300;">Country: </td>
                                                                                        <td align="left" style="padding: 5px;"><input type="text" value="<?php echo $row6['country']; ?>" name="emCountry" style="width: 200px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right" style="padding: 5px; color: #663300;">Region: </td>
                                                                                        <td align="left" style="padding: 5px;"><input type="text" value="<?php echo $row6['region']; ?>" name="emRegion" style="width: 200px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right" style="padding: 5px; color: #663300;">Town: </td>
                                                                                        <td align="left" style="padding: 5px;"><input type="text" value="<?php echo $row6['town']; ?>" name="emTown" style="width: 200px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right" style="padding: 5px; color: #663300;">Kebele: </td>
                                                                                        <td align="left" style="padding: 5px;"><input type="text" value="<?php echo $row6['kebele']; ?>" name="emKebele" style="width: 200px; padding: 5px; border: 1px solid rgb(153,153,153);" /></td>
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
                                                    <input type="submit" value="" style="background: transparent; background-image: url('../css/images/update.png'); width: 100px; height: 25px; display: inline-block;" />
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