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
                                <title>Human Resource Management System</title>
                                <style type="text/css" rel="stylesheet">
                                    @import url("css/style.css");
                                </style>
                                </head>
                                <body>

                                    <div id="container">
                                        <div id="header"></div>
                                        <div id="content">

                                            <br />
                                            <br />
                                            <br />

                                            <br />

                                            <p align="left"><b style="color: red;"><u>Note</u>:</b> The specified Username or Password was <u>Not Correct</u>! Please retry logging in using a valid Username and Password.</p>

                                            <br />
                                            <br />

                                            <table width="50%" style="border: 3px double #88EE55; margin: 0px auto;">
                                                <tr>
                                                    <td align="center" style="background-color: red;"><h1 style="color: white;">Access Denied</h1></td>
                                                </tr>
                                                <tr>
                                                    <td align="center" style="color: green; padding: 10px;">
                                                            <table align="center">
                                                                <tr>
                                                                    <td valign="center" style="width: 50px; height: 50px;"><img src="css/images/error.png" /></td>
                                                                    <td valign="center"><h4>Sorry, you don't have the Permission to Access the Page!</h4></td>
                                                                </tr>
                                                            </table>
                                                    </td>
                                                </tr>
                                            </table>
                                            <br />
                                            <p align="right"><a href="index.php" target="_self">Back to Login Page</a></p>


                                            <br />
                                            <br />
                                            <br />

                                        </div>
                                        <div id="footer">
                                            <br />
                                            <br />
                                            <p align="center">Copyright 2013 &copy; [ Hawassa Polytechnic College HRMS ] &middot; All Right Reserved &middot; <a href="#">PG Students Project</a></p>
                                        </div>
                                    </div>

                                </body>
                                </html>