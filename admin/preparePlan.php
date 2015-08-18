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
                                <link rel="stylesheet" href="../css/themes/base/jquery.ui.all.css" />
                                <script src="../js/jquery-1.9.1.js"></script>
                                <script src="../js/jquery.sheepItPlugin.js"></script>
                                <style type="text/css" rel="stylesheet">
                                    @import url("../css/style.css");
                                </style>
                                <script language="javascript">
                                    function addRow(tableID) {
 
                                        var table = document.getElementById(tableID);
 
                                        var rowCount = table.rows.length;
                                        var row = table.insertRow(rowCount);
 
                                        var colCount = table.rows[0].cells.length;
 
                                        for(var i=0; i<colCount; i++) {
 
                                            var newcell = row.insertCell(i);
 
                                            newcell.innerHTML = table.rows[0].cells[i].innerHTML;
                                            switch(newcell.childNodes[0].type) {
                                                case "text":
                                                    newcell.childNodes[0].value = "";
                                                    break;
                                                case "checkbox":
                                                    newcell.childNodes[0].checked = false;
                                                    break;
                                            }
                                        }
                                    }
 
                                    function deleteRow(tableID) {
                                        try {
                                            var table = document.getElementById(tableID);
                                            var rowCount = table.rows.length;
 
                                            for(var i=0; i<rowCount; i++) {
                                                var row = table.rows[i];
                                                var chkbox = row.cells[0].childNodes[0];
                                                if(null != chkbox && true == chkbox.checked) {
                                                    if(rowCount <= 1) {
                                                        alert("Cannot delete all the rows.");
                                                        break;
                                                    }
                                                    table.deleteRow(i);
                                                    rowCount--;
                                                    i--;
                                                }
 
 
                                            }
                                        }catch(e) {
                                            alert(e);
                                        }
                                    }
 
                                </script>
                                <style>

                                    a {
                                        text-decoration:underline;
                                        color:#00F;
                                        cursor:pointer;
                                    }

                                    #sheepItForm_controls div, #sheepItForm_controls div input {
                                        float:left;    
                                        margin-right: 10px;
                                    }


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
                                            <a href="view.php" target="_self" style="background-image: url('../css/images/view.png'); width: 100px; height: 25px; display: inline-block;"></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="control.php" target="_self" style="background-image: url('../css/images/control.png'); width: 150px; height: 25px; display: inline-block;"></a>
                                        </div>
                                        <div id="content">

                                            <div align="right" style="width: 100%;">
                                                <form action="#" method="post">
                                                    <input type="text" style="padding: 5px; border: 1px solid rgb(153,153,153); background:url('../css/images/searchImg.png') no-repeat 100% 50%" name="q" size="31" />
                                                    <input type="submit" name="sa" value="Search" style="height: 25px;border: 1px solid #3399ff; border-radius: 5px;" />
                                                </form>
                                            </div>

                                            <h3 align="center"><u>Prepare Training Plan</u></h3>
                                            <br />




                                            <br />

                                            <form name="" action="savePlan.php" method="post">

                                                <INPUT type="button" value="Add Row" onclick="addRow('dataTable')" />

                                                <INPUT type="button" value="Delete Row" onclick="deleteRow('dataTable')" />

                                                <table align="center" width="98%" style="padding: 5px; border: 1px dashed rgb(153,153,153);">
                                                    <tr>
                                                        <td align="center" style="width: 50px; background-color: #cccccc; padding: 5px; color: #cd0a0a; border: 1px solid rgb(153,153,153);"><b>#</b> </td>
                                                        <td align="center" style="width: 300px; background-color: #cccccc; padding: 5px; color: #cd0a0a; border: 1px solid rgb(153,153,153);"><b>Employee ID:</b> </td>
                                                        <td align="center" style="width: 300px; background-color: #cccccc; padding: 5px; color: #cd0a0a; border: 1px solid rgb(153,153,153);"><b>Planned Training:</b> </td>
                                                        <td align="center" style="background-color: #cccccc; padding: 5px; color: #cd0a0a; border: 1px solid rgb(153,153,153);"><b>Number of Participant:</b> </td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">


                                                            <table id="dataTable" style="width: 100%; border: 1px solid rgb(153,153,153);">

                                                                <tr>
                                                                    <td style="width: 55px;" ><INPUT type="checkbox" style="padding: 5px; border: 1px solid rgb(153,153,153);" name="chk"/></td>
                                                                    <td style="width: 315px;"><INPUT type="text" style="width: 250px; padding: 5px; border: 1px solid rgb(153,153,153);" name="empID[]"/></td>
                                                                    <td style="width: 315px;"><INPUT type="text" style="width: 250px; padding: 5px; border: 1px solid rgb(153,153,153);" name="palnnedTraining[]"/></td>
                                                                    <td><INPUT type="text" style="width: 250px; padding: 5px; border: 1px solid rgb(153,153,153);" name="numberofParticipant[]"/></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="4" align="right" style="padding: 5px;">
                                                            <input type="submit" value="" style="background-image: url('../css/images/preparePlan.png'); width: 150px; height: 35px; display: inline-block;" />

                                                        </td>
                                                    </tr>
                                                </table>


                                            </form>

                                        </div>
                                        <div id="footer">
                                            <br />
                                            <br />
                                            <p align="center">Copyright 2013 &copy; [ Hawassa Polytechnic College HRMS ] &middot; All Right Reserved &middot; <a href="#">PG Students Project</a></p>
                                        </div>
                                    </div>

                                </body>