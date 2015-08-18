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
                                        <div id="content">

                                            <p align="right">
                                                <a href="clients.php" style="background-image: url('css/images/client.png'); width: 150px; height: 40px; display: inline-block;" title="Login as Client" target="_self"></a>
                                            </p>
                                            
                                            <br />
                                            <br />

                                            <form action="validateLogin.php" method="post" onsubmit="return checkLogin()">

                                                <fieldset style="position: relative; border: 1px double #b6b6b6; padding: 5px;  background: #f0f0f0;  width: 300px; height: auto;">
                                                    <legend style="color: #1c94c4; font-size: 14px; font-weight: bold; font-family: serif; height: 38px; width: 28px; background-image: url(css/images/login_key.png);"></legend>

                                                    <table align="center">
                                                        <tr>
                                                            <td align="center" style="padding-right: 5px;" width="50%"><label for="name"><b>Username: </b></label></td>
                                                            <td align="right" style="padding: 5px;">
                                                                <input type="text" name="username" id="username" onfocus="document.getElementById('status').innerHTML='';" style="padding: 3px; border: 1px solid rgb(153,153,153);" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" style="padding-right: 5px;"><label for="pass"><b>Password:</b></label></td>
                                                            <td align="right" style="padding: 5px;"><input type="password" id="password" name="password" onfocus="document.getElementById('status').innerHTML='';" style="padding: 3px; border: 1px solid rgb(153,153,153);" /></td>
                                                        </tr>

                                                        <tr>
                                                            <td align="center" style="padding-right: 5px;"><label for="pass"><b>Role Type:</b></label></td>
                                                            <td align="right" style="padding: 5px;">
                                                                <select size="1" id="roleType" name="roleType" onfocus="document.getElementById('status').innerHTML='';" style="width: 150px; padding: 3px; border: 1px solid rgb(153,153,153);">
                                                                    <option value="">* Select Role *</option>
                                                                    <option value="admin">Admin</option>
                                                                    <option value="employee">Employee</option>
                                                                    <option value="HRM Clerk">HRM Cleark</option>
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td align="center" style="padding: 5px;"><input type="submit" value="" style="background-image: url(css/images/login_arrow.png); width: 80px; height: 22px;" /></td>

                                                            <td align="left" style="padding: 5px;"><input type="reset" value="" style="background-image: url(css/images/cancel_login.png); width: 80px; height: 22px;" /></td>
                                                        </tr>

                                                    </table>                                              

                                                </fieldset>

                                            </form>
                                            <br />
                                            <div align="center" id="status"></div>

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