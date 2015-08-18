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

$id = $_SESSION['clerk'];
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
                                        <div id="links" align="right">
                                            <b style="text-align: left;"><?php echo "Logged User: <u>".$id."</u>";?></b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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

                                            <h1 align="center"><marquee>Welcome to Hawassa Polytechnic college Human Resource Management System</marquee></h1>
                                            
                                            <table align="center" style="width: 100%;">
                                                <tr>
                                                    <td style="text-align: justify; font-size: 14px; padding: 10px; font-family: 'Times new Roman';">

                                                        <b>Hawassa polytechnic college</b> is one of the 22 public TVET colleges in the region. Since its establishment in 1990 E.C the college had been offering technical and vocational education and training service for the local community though both formal and non formal programs. Although the college had started its function in limited number of occupations, limited material and human resource, through process promising improvements have been achieved and its contribution to local development is becoming prominent.  
                                                        
                                                        <br />
                                                        <br />
                                                        <b style="text-align: center;">Nature of the organization</b>
                                                        <br />
                                                        <br />
                                                        <b>Mission</b>
                                                        <br />
                                                        <br />
                                                        The Hawassa Polytechnic College is committed to produce competitive and morally upright human resource through quality technical and vocational training. It shall provide opportunities to develop entrepreneurship and deliver standardized industry extension services in the community.
                                                        Vision
                                                        To be the premier polytechnic college in the region recognized for excellence in technical and vocational training and industrial extension services that enhance quality of life in Multi-cultural society.

                                                       <br /><br />  <b>Description of the current training program(s)</b><br />
                                                        The college is providing training based on market assessment in nine sectors and 36 occupations. Training programs are based on the results of market assessment of local and regional manpower requirements of both public and privet sectors. Training programs focus on the development oriented sectors which are special importance in line with the growth and transformation plan of the country. Training is provided in formal and non formal programs to meet the interests of different social and economic groups. In this regard the college is working with regional TVET bureau and other concerned bodies to start new training programs in other fields which are found to be important in line with the development plan of the region.


                                                    </td>
                                                    <td align="center" valign="top" style="width: 629px; height: 415px;">
                                                        <img src="../css/images/home_bg.png" />
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