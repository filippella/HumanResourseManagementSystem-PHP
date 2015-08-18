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

                                            <h3 align="center"><u>Report Management Module</u></h3>
                                            <br />

                                            <table style="width: 100%; border: 1px solid rgb(153,153,153);">
                                                <tr>
                                                    <td align="center" valign="top" style="width: 250px;">
                                                        <b><u>View Report By</u></b><br /><br />
                                                        <table width="100%" style="padding: 5px; border-top: 3px groove rgb(153,153,153);">
                                                            <tr>
                                                                <td align="left"><img src="../css/images/report_1.png" /> <a href="viewRegisteredEmployeeList.php">Registered Employee List</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left"><img src="../css/images/report_1.png" /> <a href="viewClientApplications.php">View Client Applications</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left"><img src="../css/images/report_1.png" /> <a href="employeeLeaveRequest.php">Employee Leave Request</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left"><img src="../css/images/report_1.png" /> <a href="viewPension.php">Employees Pension</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left"><img src="../css/images/report_1.png" /> <a href="vacancyList.php">View Posted Vacancy (Recruitment)</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left"><img src="../css/images/report_1.png" /> <a href="viewAppraisal.php">View Appraisal</a></td>
                                                            </tr>

                                                        </table>
                                                    </td>
                                                    <td align="center" valign="top" style="border-left: 3px groove rgb(153,153,153);">

                                                        <table width="100%" align="center">
                                                            <tr>
                                                                <td align="center" style="border: 1px solid rgb(153,153,153);"><b>No.</b></td>
                                                                <td align="center" style="border: 1px solid rgb(153,153,153);"><b>Photo</b></td>
                                                                <td align="center" style="border: 1px solid rgb(153,153,153);"><b>Employee ID</b></td>
                                                                <td align="center" style="border: 1px solid rgb(153,153,153);"><b>First Name</b></td>
                                                                <td align="center" style="border: 1px solid rgb(153,153,153);"><b>Last Name</b></td>
                                                                <td align="center" style="border: 1px solid rgb(153,153,153);"><b>Gender</b></td>
                                                            </tr>

                                                            <?php
                                                            require_once('../include/MySqlDb.php');
                                                            $Db = new MysqlDB();

                                                            $query = mysql_query("SELECT * FROM  `employeegeneralinformation` ORDER BY  `employeegeneralinformation`.`empID` ASC");
                                                            if ($query) {
                                                                $i = 0;
                                                                while ($row = mysql_fetch_array($query)) {
                                                                    $i++;
                                                                    $en = base64_encode($row['empImageData']);
                                                                    $mime = 'image/png';
                                                                    $binary_data = 'data:' . $mime . ';base64,' . $en;
                                                                    ?>
                                                                    <tr>
                                                                        <td align="center" style="border: 1px solid rgb(153,153,153);"><?php echo $i; ?></td>
                                                                        <td align="center" style="border: 1px solid rgb(153,153,153);"><img src="<?php echo $binary_data; ?>" width="20" height="20" /></td>
                                                                        <td align="center" style="border: 1px solid rgb(153,153,153);"><b style="color: #3399ff;"><?php echo $row['empID']; ?></b></td>
                                                                        <td align="center" style="border: 1px solid rgb(153,153,153);"><?php echo $row['firstName']; ?></td>
                                                                        <td align="center" style="border: 1px solid rgb(153,153,153);"><?php echo $row['lastName']; ?></td>
                                                                        <td align="center" style="border: 1px solid rgb(153,153,153);"><?php echo $row['gender']; ?></td>
                                                                    </tr>

                                                                    <?php
                                                                }
                                                            } else {
                                                                
                                                            }
                                                            ?>

                                                        </table>

                                                    </td>
                                                </tr>
                                            </table>



                                        </div>
                                        <div id="footer">
                                            <br />
                                            <br />
                                            <p align="center">Copyright 2013 &copy; [ Hawassa Polytechnic College HRMS ] &middot; All Right Reserved &middot; <a href="#">PG Students Project</a></p>
                                        </div>
                                    </div>

                                </body>