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

require_once('../INCLUDE/MySqlDb.php');
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
                                <style type="text/css" rel="stylesheet">
                                    @import url("../css/style.css");
                                </style>

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

                                            <br />
                                            <form name="" action="" method="post">
                                                <table width="80%" style="border: 1px solid #999;">
                                                    <tr>
                                                        <td colspan="3" style="padding: 10px; font-size: 14px; text-align: center; background-color: #3399ff; color: white;"><h3 align="center">Applied Client Application Recruitment</h3></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" width="80%" style="padding: 5px;border: 1px solid #e6e6e6;">Please Select the Vacancy Code that You have Applied:</td>
                                                        <td align="center" style="padding: 5px;border: 1px solid #e6e6e6;">
                                                            <select style="border: 1px solid #e6e6e6; min-width: 200px;" name="vacCode" size="1" onchange="viewVacResults(this.value)">
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
                                                        <td align="center" style="padding: 5px; border: 1px solid #e6e6e6;">
                                                            <select name="round">
                                                                <option value="first">First Round</option>
                                                                <option value="second">Second Round</option>
                                                            </select>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" style="padding: 10px; font-size: 14px;" align="right">
                                                            <input type="submit" name="view" value="" style="background-image: url('../css/images/view.png'); width: 100px; height: 25px; display: inline-block;" />
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