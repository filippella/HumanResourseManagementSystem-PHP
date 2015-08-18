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
                                </html>