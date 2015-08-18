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

                                <link rel="stylesheet" href="../css/themes/base/jquery.ui.all.css" />
                                <script src="../js/jquery-1.9.1.js"></script>
                                <script src="../js/jquery.ui.core.js"></script>

                                <link rel="stylesheet" href="../demos.css" />

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
                                            <a href="delete.php" target="_self" style="background-image: url('../css/images/delete.png'); width: 100px; height: 25px; display: inline-block;"></a>&nbsp;&nbsp;
                                            <a href="search.php" target="_self" style="background-image: url('../css/images/search.png'); width: 100px; height: 25px; display: inline-block;"></a>&nbsp;&nbsp;
                                            <a href="control.php" target="_self" style="background-image: url('../css/images/control.png'); width: 150px; height: 25px; display: inline-block;"></a>
                                        </div>
                                        <div id="content">

                                            <table width="100%" align="center">
                                                <tr>
                                                    <td align="center" style="border: 1px solid rgb(153,153,153);"><b>No.</b></td>
                                                    <td align="center" style="border: 1px solid rgb(153,153,153);"><b>Photo</b></td>
                                                    <td align="center" style="border: 1px solid rgb(153,153,153);"><b>Employee ID</b></td>
                                                    <td align="center" style="border: 1px solid rgb(153,153,153);"><b>First Name</b></td>
                                                    <td align="center" style="border: 1px solid rgb(153,153,153);"><b>Last Name</b></td>
                                                    <td align="center" style="border: 1px solid rgb(153,153,153);"><b>Gender</b></td>
                                                    <td align="center" style="border: 1px solid rgb(153,153,153);"><b>Vacancy Code</b></td>
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
                                                            <td align="center" style="border: 1px solid rgb(153,153,153);"><?php echo $row['vacCode']; ?></td>
                                                        </tr>

                                                        <?php
                                                    }
                                                } else {
                                                    
                                                }
                                                ?>

                                            </table>


                                        </div>
                                        <div id="footer">
                                            <br />
                                            <br />
                                            <p align="center">Copyright 2013 &copy; [ Hawassa Polytechnic College HRMS ] &middot; All Right Reserved &middot; <a href="#">PG Students Project</a></p>
                                        </div>
                                    </div>

                                </body>