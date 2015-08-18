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

                                            <form name="" action="" method="post">

                                                <table style="width: 850px; border: 1px solid #999;">
                                                    <tr>
                                                        <td colspan="4" style="padding: 10px; font-size: 14px; text-align: center; background-color: #3399ff; color: white;"><h3 align="center">Vacancy Recruitment Results</h3></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" width="60%" style="padding: 5px;border: 1px solid #e6e6e6;">Please Select the Vacancy Code that You have Applied:</td>
                                                        <td align="center" style="padding: 5px;border: 1px solid #e6e6e6;">
                                                            <select style="border: 1px solid #e6e6e6; min-width: 200px;" name="vacCode" size="1">
                                                                <option value="">Please Select</option>
                                                                <?php
                                                                $query = mysql_query("SELECT * FROM EmployeeRecruitment");
                                                                if ($query) {
                                                                    while ($row = mysql_fetch_array($query)) {
                                                                        ?>
                                                                        <option value="<?php echo $row['vacCode']; ?>"><?php echo $row['vacCode']; ?></option>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td align="center" style="padding: 5px;border: 1px solid #e6e6e6;">
                                                            <select name="round">
                                                                <option value="first">First Round</option>
                                                                <option value="second">Second Round</option>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 10px; font-size: 14px;" align="right">
                                                            <input type="submit" name="view" value="" style="background-image: url('css/images/view.png'); width: 100px; height: 25px; display: inline-block;" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </form>
                                            <br />

                                            <div align="center">
                                                <?php
                                                if (isset($_POST['view'])) {

                                                    $round = $_POST['round'];
                                                    if ($round == "first") {

                                                        $vac = $_POST['vacCode'];
                                                        $Db->sortFirstRoundClientApplication($vac);

                                                        $requiredNumber = 0;

                                                        $q = mysql_query("SELECT * FROM EmployeeRecruitment where vacCode = '$vac'");
                                                        if ($q) {
                                                            $rw = mysql_fetch_array($q);
                                                            $requiredNumber = $rw['requiredNumber'];
                                                            $requiredNumber = $requiredNumber * 2;
                                                        }

                                                        $query = mysql_query("SELECT * FROM `FirstRoundResult` ORDER BY totalPoint DESC");

                                                        echo "<b style='color: blue;'>Those who are selected with green color are selected for first Round and Required to report in person to HRM Office for interview and Exam.</b><br /><br />";

                                                        echo "<table align='center' style='width: 100%; border: 1px dashed #eaa766; padding: 5px;'>";
                                                        echo "<tr>";
                                                        echo "<td align='center' style='background-color:black; color: white; border: 1px solid #eaa766;'>#Rank</td>";
                                                        echo "<td align='center' style='background-color: black; color: white; border: 1px solid #eaa766;'>Employee ID</td>";
                                                        echo "<td align='center' style='background-color: black; color: white; border: 1px solid #eaa766;'>First Name</td>";
                                                        echo "<td align='center' style='background-color: black; color: white; border: 1px solid #eaa766;'>Last Name</td>";
                                                        echo "<td align='center' style='background-color: black; color: white; border: 1px solid #eaa766;'>Sex</td>";
                                                        echo "<td align='center' style='background-color: black; color: white; border: 1px solid #eaa766;'>Application Date</td>";
                                                        echo "<td align='center' style='background-color: black; color: white; border: 1px solid #eaa766;'>GPA</td>";
                                                        echo "<td align='center' style='background-color: black; color: white; border: 1px solid #eaa766;'>Experience</td>";
                                                        echo "<td align='center' style='background-color: black; color: white; border: 1px solid #eaa766;'>Point (%)</td>";
                                                        echo "</tr>";

                                                        if ($query) {
                                                            $i = 0;

                                                            while ($row = mysql_fetch_array($query)) {
                                                                $i++;

                                                                if ($i <= $requiredNumber) {
                                                                    $bgColor = "#88EE55";
                                                                    $color = "blue";
                                                                } else {
                                                                    $bgColor = "#cd0a0a";
                                                                    $color = "white";
                                                                }

                                                                $empID = $row['empID'];
                                                                $firstName = $row['firstName'];
                                                                $lastName = $row['lastName'];
                                                                $sex = $row['sex'];
                                                                $applicationDate = $row['applicationDate'];
                                                                $gpa = $row['gpa'];
                                                                $experience = $row['experience'];
                                                                $totPoint = $row['totalPoint'];

                                                                if ($totPoint == 99.9) {
                                                                    $totPoint = 100;
                                                                }

                                                                echo "<tr>";
                                                                echo "<td align='center' style='background-color: $bgColor; color: $color; border: 1px solid #eaa766; padding: 10px; font-size: 12px;'>" . $i . "</td>";
                                                                echo "<td align='center' style='background-color: $bgColor; color: $color; border: 1px solid #eaa766;'>" . $empID . "</td>";
                                                                echo "<td align='center' style='background-color: $bgColor; color: $color; border: 1px solid #eaa766;'>" . $firstName . "</td>";
                                                                echo "<td align='center' style='background-color: $bgColor; color: $color; border: 1px solid #eaa766;'>" . $lastName . "</td>";
                                                                echo "<td align='center' style='background-color: $bgColor; color: $color; border: 1px solid #eaa766;'>" . $sex . "</td>";
                                                                echo "<td align='center' style='background-color: $bgColor; color: $color; border: 1px solid #eaa766;'>" . $applicationDate . "</td>";
                                                                echo "<td align='center' style='background-color: $bgColor; color: $color; border: 1px solid #eaa766;'>" . $gpa . "</td>";
                                                                echo "<td align='center' style='background-color: $bgColor; color: $color; border: 1px solid #eaa766;'>" . $experience . "</td>";
                                                                echo "<td align='center' style='background-color: $bgColor; color: $color; border: 1px solid #eaa766;'>" . $totPoint . "</td>";
                                                                echo "</tr>";
                                                            }
                                                            echo "</table>";
                                                        }
                                                    } else {

                                                        $vac = $_POST['vacCode'];
                                                        $requiredNumber = 0;

                                                        $q = mysql_query("SELECT * FROM EmployeeRecruitment where vacCode = '$vac'");
                                                        if ($q) {
                                                            $rw = mysql_fetch_array($q);
                                                            $requiredNumber = $rw['requiredNumber'];
                                                        }

                                                        $query = mysql_query("SELECT * FROM `employeesecondroundresult` ORDER BY total DESC");

                                                        echo "<b style='color: blue;'>Those who are selected with green color are selected for the Vacancy Announced, so please report to HRM Office.</b><br /><br />";
                                                        
                                                        echo "<table align='center' style='width: 100%; border: 1px dashed #eaa766; padding: 5px;'>";
                                                        echo "<tr>";
                                                        echo "<td align='center' style='background-color:black; color: white; border: 1px solid #eaa766;'>#Rank</td>";
                                                        echo "<td align='center' style='background-color: black; color: white; border: 1px solid #eaa766;'>Employee ID</td>";
                                                        echo "<td align='center' style='background-color: black; color: white; border: 1px solid #eaa766;'>Vacancy Code</td>";
                                                        echo "<td align='center' style='background-color: black; color: white; border: 1px solid #eaa766;'>Exam Resul</td>";
                                                        echo "<td align='center' style='background-color: black; color: white; border: 1px solid #eaa766;'>Interview Result</td>";
                                                        echo "<td align='center' style='background-color: black; color: white; border: 1px solid #eaa766;'>Total Point (%)</td>";
                                                        echo "</tr>";
                                                        $i = 0;
                                                        while ($row = mysql_fetch_array($query)) {
                                                            $i++;
                                                            if ($i <= $requiredNumber) {
                                                                $bgColor = "#88EE55";
                                                                $color = "blue";
                                                            } else {
                                                                $bgColor = "#cd0a0a";
                                                                $color = "white";
                                                            }
                                                            
                                                            $empID = $row['empID'];
                                                            $vacCode = $row['vacCode'];
                                                            $examResult = $row['examResult'];
                                                            $interviewResult = $row['interviewResult'];
                                                            $total = $row['total'];

                                                            if ($total == 99.9) {
                                                                $total = 100;
                                                            }

                                                            echo "<tr>";
                                                            echo "<td align='center' style='background-color: $bgColor; color: $color; border: 1px solid #eaa766; padding: 10px; font-size: 12px;'>" . $i . "</td>";
                                                            echo "<td align='center' style='background-color: $bgColor; color: $color; border: 1px solid #eaa766;'>" . $empID . "</td>";
                                                            echo "<td align='center' style='background-color: $bgColor; color: $color; border: 1px solid #eaa766;'>" . $vacCode . "</td>";
                                                            echo "<td align='center' style='background-color: $bgColor; color: $color; border: 1px solid #eaa766;'>" . $examResult . "</td>";
                                                            echo "<td align='center' style='background-color: $bgColor; color: $color; border: 1px solid #eaa766;'>" . $interviewResult . "</td>";
                                                            echo "<td align='center' style='background-color: $bgColor; color: $color; border: 1px solid #eaa766;'>" . $total . "</td>";
                                                            echo "</tr>";
                                                        }
                                                        echo "</table>";
                                                    }
                                                }
                                                ?>
                                            </div>

                                        </div>
                                        <div id="footer">
                                            <br />
                                            <br />
                                            <p align="center">Copyright 2013 &copy; [ Hawassa Polytechnic College HRMS ] &middot; All Right Reserved &middot; <a href="#">PG Students Project</a></p>
                                        </div>
                                    </div>

                                </body>
                                </html>