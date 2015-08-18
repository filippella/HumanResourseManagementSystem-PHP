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
                                            <a href="delete.php" target="_self" style="background-image: url('../css/images/delete.png'); width: 100px; height: 25px; display: inline-block;"></a>&nbsp;&nbsp;
                                            <a href="view.php" target="_self" style="background-image: url('../css/images/view.png'); width: 100px; height: 25px; display: inline-block;"></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="control.php" target="_self" style="background-image: url('../css/images/control.png'); width: 150px; height: 25px; display: inline-block;"></a>
                                        </div>
                                        <div id="content">


                                            <div class="toggler" align="center">
                                                <div id="effect" class="ui-widget-content ui-corner-all">
                                                    <h3 class="ui-widget-header ui-corner-all">Search Result</h3>
                                                    <table align="center" width="100%">
                                                        <tr>
                                                            <td valign="middle"><img src="../css/images/success.gif" /></td>
                                                            <td valign="middle">Employee found in HRMS Database.</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <br />

                                            <table width="95%" style="border: 1px solid #999;">
                                                <tr>
                                                    <td align="center" colspan="2" width="100%" style="border: 1px solid #2eb450; padding: 10px;" ><h4>Employee Information</h4> </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" width="50%">
                                                        <table width="100%" align="center" style="border: 1px solid #2eb450;">
                                                            <tr>
                                                                <td colspan="2" align="left"><img src="<?php echo $binary_data; ?>" width="55" height="55" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="right" width="50%" style="border: 1px solid #2eb450; padding: 5px;" >Employee ID Number: </td>
                                                                <td align="center" style="border: 1px solid #2eb450; padding: 5px;"><?php echo $row1['empID']; ?></td>                                                    
                                                            </tr>
                                                            <tr>
                                                                <td align="right" width="50%" style="border: 1px solid #2eb450; padding: 5px;" >First Name: </td>
                                                                <td align="center" style="border: 1px solid #2eb450; padding: 5px;"><?php echo $row1['firstName']; ?></td>                                                    
                                                            </tr>
                                                            <tr>
                                                                <td align="right" width="50%" style="border: 1px solid #2eb450; padding: 5px;" >Gender: </td>
                                                                <td align="center" style="border: 1px solid #2eb450; padding: 5px;"><?php echo $row1['lastName']; ?></td>                                                    
                                                            </tr>
                                                            <tr>
                                                                <td align="right" width="50%" style="border: 1px solid #2eb450; padding: 5px;" >Vacancy Code: </td>
                                                                <td align="center" style="border: 1px solid #2eb450; padding: 5px;"><?php echo $row1['gender']; ?></td>                                                    
                                                            </tr>
                                                            <tr>
                                                                <td align="right" width="50%" style="border: 1px solid #2eb450; padding: 5px;" >Country: </td>
                                                                <td align="center" style="border: 1px solid #2eb450; padding: 5px;"><?php echo $row1['vacCode']; ?></td>                                                    
                                                            </tr>
                                                            <tr>
                                                                <td align="right" width="50%" style="border: 1px solid #2eb450; padding: 5px;" >Mobile Number: </td>
                                                                <td align="center" style="border: 1px solid #2eb450; padding: 5px;"><?php echo $row2['mobileNumber']; ?></td>                                                    
                                                            </tr>
                                                            <tr>
                                                                <td align="right" width="50%" style="border: 1px solid #2eb450; padding: 5px;" >Telephone Number: </td>
                                                                <td align="center" style="border: 1px solid #2eb450; padding: 5px;"><?php echo $row2['telephoneNumber']; ?></td>                                                    
                                                            </tr>
                                                            <tr>
                                                                <td align="right" width="50%" style="border: 1px solid #2eb450; padding: 5px;" >Email: </td>
                                                                <td align="center" style="border: 1px solid #2eb450; padding: 5px;"><?php echo $row2['country']; ?></td>                                                    
                                                            </tr>
                                                            <tr>
                                                                <td align="right" width="50%" style="border: 1px solid #2eb450; padding: 5px;" >Region: </td>
                                                                <td align="center" style="border: 1px solid #2eb450; padding: 5px;"><?php echo $row3['region']; ?></td>                                                    
                                                            </tr>
                                                            <tr>
                                                                <td align="right" width="50%" style="border: 1px solid #2eb450; padding: 5px;" >Sub city: </td>
                                                                <td align="center" style="border: 1px solid #2eb450; padding: 5px;"><?php echo $row3['subcity']; ?></td>                                                    
                                                            </tr>
                                                            <tr>
                                                                <td align="right" width="50%" style="border: 1px solid #2eb450; padding: 5px;" >Woreda: </td>
                                                                <td align="center" style="border: 1px solid #2eb450; padding: 5px;"><?php echo $row3['woreda']; ?></td>                                                    
                                                            </tr>
                                                            <tr>
                                                                <td align="right" width="50%" style="border: 1px solid #2eb450; padding: 5px;" >Kebele: </td>
                                                                <td align="center" style="border: 1px solid #2eb450; padding: 5px;"><?php echo $row3['kebele']; ?></td>                                                    
                                                            </tr>
                                                            <tr>
                                                                <td align="right" width="50%" style="border: 1px solid #2eb450; padding: 5px;" >House Number: </td>
                                                                <td align="center" style="border: 1px solid #2eb450; padding: 5px;"><?php echo $row3['houseNumber']; ?></td>                                                    
                                                            </tr>
                                                            <tr>
                                                                <td align="right" width="50%" style="border: 1px solid #2eb450; padding: 5px;" >Date of Birth: </td>
                                                                <td align="center" style="border: 1px solid #2eb450; padding: 5px;"><?php echo $row4['dateOfBirth']; ?></td>                                                    
                                                            </tr>
                                                            <tr>
                                                                <td align="right" width="50%" style="border: 1px solid #2eb450; padding: 5px;" >Marital Status: </td>
                                                                <td align="center" style="border: 1px solid #2eb450; padding: 5px;"><?php echo $row4['maritalStatus']; ?></td>                                                    
                                                            </tr>
                                                            <tr>
                                                                <td align="right" width="50%" style="border: 1px solid #2eb450; padding: 5px;" >Mother Name: </td>
                                                                <td align="center" style="border: 1px solid #2eb450; padding: 5px;"><?php echo $row4['motherName']; ?></td>                                                    
                                                            </tr>
                                                            <tr>
                                                                <td align="right" width="50%" style="border: 1px solid #2eb450; padding: 5px;" >Number of Son: </td>
                                                                <td align="center" style="border: 1px solid #2eb450; padding: 5px;"><?php echo $row4['numberOfSon']; ?></td>                                                    
                                                            </tr>
                                                        </table>

                                                    </td>
                                                    <td align="center" width="50%">
                                                        <table width="100%" align="center" style="border: 1px solid #2eb450;">

                                                            
                                                            <tr>
                                                                <td align="right" width="50%" style="border: 1px solid #2eb450; padding: 5px;" >Number of Daughter: </td>
                                                                <td align="center" style="border: 1px solid #2eb450; padding: 5px;"><?php echo $row4['numberOfDaughter']; ?></td>                                                    
                                                            </tr>
                                                            <tr>
                                                                <td align="right" width="50%" style="border: 1px solid #2eb450; padding: 5px;" >Employment Date: </td>
                                                                <td align="center" style="border: 1px solid #2eb450; padding: 5px;"><?php echo $row5['employmentDate']; ?></td>                                                    
                                                            </tr>
                                                            <tr>
                                                                <td align="right" width="50%" style="border: 1px solid #2eb450; padding: 5px;" >Employment Job Title: </td>
                                                                <td align="center" style="border: 1px solid #2eb450; padding: 5px;"><?php echo $row5['employeeJobTitle']; ?></td>                                                    
                                                            </tr>
                                                            <tr>
                                                                <td align="right" width="50%" style="border: 1px solid #2eb450; padding: 5px;" >Starting Salary: </td>
                                                                <td align="center" style="border: 1px solid #2eb450; padding: 5px;"><?php echo $row5['startingSalary']; ?></td>                                                    
                                                            </tr>
                                                            <tr>
                                                                <td align="right" width="50%" style="border: 1px solid #2eb450; padding: 5px;" >Current Salary: </td>
                                                                <td align="center" style="border: 1px solid #2eb450; padding: 5px;"><?php echo $row5['currentSalary']; ?></td>                                                    
                                                            </tr>
                                                            <tr>
                                                                <td align="right" width="50%" style="border: 1px solid #2eb450; padding: 5px;" >Pension Identity Number: </td>
                                                                <td align="center" style="border: 1px solid #2eb450; padding: 5px;"><?php echo $row5['pensionIdentityNumber']; ?></td>                                                    
                                                            </tr>
                                                            <tr>
                                                                <td align="right" width="50%" style="border: 1px solid #2eb450; padding: 5px;" >Tin Number: </td>
                                                                <td align="center" style="border: 1px solid #2eb450; padding: 5px;"><?php echo $row5['tinNumber']; ?></td>                                                    
                                                            </tr>
                                                            <tr>
                                                                <td align="right" width="50%" style="border: 1px solid #2eb450; padding: 5px;" >Employment Date: </td>
                                                                <td align="center" style="border: 1px solid #2eb450; padding: 5px;"><?php echo $row5['employmentDate']; ?></td>                                                    
                                                            </tr>
                                                            <tr>
                                                                <td align="right" width="50%" style="border: 1px solid #2eb450; padding: 5px;" >Job Status: </td>
                                                                <td align="center" style="border: 1px solid #2eb450; padding: 5px;"><?php echo $row5['jobStatus']; ?></td>                                                    
                                                            </tr>
                                                            <tr>
                                                                <td align="right" width="50%" style="border: 1px solid #2eb450; padding: 5px;" >Status: </td>
                                                                <td align="center" style="border: 1px solid #2eb450; padding: 5px;"><?php echo $row5['status']; ?></td>                                                    
                                                            </tr>
                                                            <tr>
                                                                <td align="right" width="50%" style="border: 1px solid #2eb450; padding: 5px;" >Emergency Contact Person First Name: </td>
                                                                <td align="center" style="border: 1px solid #2eb450; padding: 5px;"><?php echo $row6['firstName']; ?></td>                                                    
                                                            </tr>
                                                            <tr>
                                                                <td align="right" width="50%" style="border: 1px solid #2eb450; padding: 5px;" >Emergency Contact Person Last Name: </td>
                                                                <td align="center" style="border: 1px solid #2eb450; padding: 5px;"><?php echo $row6['lastName']; ?></td>                                                    
                                                            </tr>
                                                            <tr>
                                                                <td align="right" width="50%" style="border: 1px solid #2eb450; padding: 5px;" >Emergency Contact Person Mobile number: </td>
                                                                <td align="center" style="border: 1px solid #2eb450; padding: 5px;"><?php echo $row6['mobileNumber']; ?></td>                                                    
                                                            </tr>
                                                            <tr>
                                                                <td align="right" width="50%" style="border: 1px solid #2eb450; padding: 5px;" >Emergency Contact Person Telephone Number: </td>
                                                                <td align="center" style="border: 1px solid #2eb450; padding: 5px;"><?php echo $row6['telNumber']; ?></td>                                                    
                                                            </tr>
                                                            <tr>
                                                                <td align="right" width="50%" style="border: 1px solid #2eb450; padding: 5px;" >Emergency Contact Person Country: </td>
                                                                <td align="center" style="border: 1px solid #2eb450; padding: 5px;"><?php echo $row6['country']; ?></td>                                                    
                                                            </tr>
                                                            <tr>
                                                                <td align="right" width="50%" style="border: 1px solid #2eb450; padding: 5px;" >Emergency Contact Person Region: </td>
                                                                <td align="center" style="border: 1px solid #2eb450; padding: 5px;"><?php echo $row6['region']; ?></td>                                                    
                                                            </tr>
                                                            <tr>
                                                                <td align="right" width="50%" style="border: 1px solid #2eb450; padding: 5px;" >Emergency Contact Person Town: </td>
                                                                <td align="center" style="border: 1px solid #2eb450; padding: 5px;"><?php echo $row6['town']; ?></td>                                                    
                                                            </tr>
                                                            <tr>
                                                                <td align="right" width="50%" style="border: 1px solid #2eb450; padding: 5px;" >Emergency Contact Person Kebele: </td>
                                                                <td align="center" style="border: 1px solid #2eb450; padding: 5px;"><?php echo $row6['kebele']; ?></td>                                                    
                                                            </tr>                                                
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>


                                            <br />

                                        </div>
                                        <div id="footer">
                                            <br />
                                            <br />
                                            <p align="center">Copyright 2013 &copy; [ Hawassa Polytechnic College HRMS ] &middot; All Right Reserved &middot; <a href="#">PG Students Project</a></p>
                                        </div>
                                    </div>

                                </body>