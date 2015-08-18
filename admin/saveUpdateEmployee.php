<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('../include/MySqlDb.php');
$Db = new MysqlDB();

// || ==== Store Employee General Information to DB ==== || 

$employeeId = $_POST['empID'];
$employeeFisrtName = $_POST['fn'];
$employeeLastName = $_POST['ln'];
if (isset($_FILES['pic'])) {
    if ($_FILES['pic']['tmp_name'] == "") {
        $image = "NO";
    } else {
        $image = $_FILES['pic'];
    }
}

$gender = $_POST['gender'];
$vacCode = $_POST['vac_code'];

$res1 = $Db->updateEmployeeGeneralInfo($employeeId, $employeeFisrtName, $employeeLastName, $gender, $image, $vacCode);


echo $res1;

// || ==== Store Employee Contact Information to DB ==== || 

$mobileNumber = $_POST['mobNumber'];
$telephoneNumber = $_POST['tn'];
$country = $_POST['cc'];
$town = $_POST['ct'];

$res2 = $Db->updateEmployeeContactInfo($employeeId, $mobileNumber, $telephoneNumber, $country, $town);
echo $res2;

// || ==== Store Employee Address Information to DB ==== || 

$email = $_POST['email'];
$region = $_POST['region'];
$subcity = $_POST['subcity'];
$woreda = $_POST['woreda'];
$kebele = $_POST['kebele'];
$houseNumber = $_POST['hn'];

$res3 = $Db->updateEmployeeAdrressInfo($employeeId, $email, $region, $subcity, $woreda, $kebele, $houseNumber);
echo $res3;


// || ==== Store Employee Personal Information to DB ==== || 


$dateOfBirth = $_POST['dob'];
$maritalStatus = $_POST['ms'];
$motherName = $_POST['motherName'];
$numberOfSon = $_POST['nos'];
$numberOfDaughter = $_POST['nod'];

$res4 = $Db->updateEmployeePersonalInfo($employeeId, $dateOfBirth, $maritalStatus, $motherName, $numberOfSon, $numberOfDaughter);
echo $res4;


// || ==== Store Employee Employment Information to DB ==== || 

$employmentDate = $_POST['empDate'];
$employeeJobTitle = $_POST['empJobTitle'];
$startingSalary = $_POST['startingSalary'];
$currentSalary = $_POST['currentSalary'];
$pensionIdentityNumber = $_POST['pensionIdentityNumber'];
$tinNumber = $_POST['tinNumber'];
$department = $_POST['department'];
$membership = $_POST['membership'];
$jobStatus = $_POST['jobStatus'];
$status = $_POST['emp_status'];

$res5 = $Db->updateEmployeeEmploymentInfo($employeeId, $employmentDate, $employeeJobTitle, $startingSalary, $currentSalary, $pensionIdentityNumber, $tinNumber, $department, $membership, $jobStatus, $status);
echo $res5;

// || ==== Store Employee Emergency Contact Information to DB ==== || 

$em_firstName = $_POST['emFn'];
$em_lastName = $_POST['emLn'];
$em_mobileNumber = $_POST['emMob'];
$em_telNumber = $_POST['emTel'];
$em_country = $_POST['emCountry'];
$em_region = $_POST['emRegion'];
$em_town = $_POST['emTown'];
$em_kebele = $_POST['emKebele'];

$res6 = $Db->updateEmployeeEmergencyContactInfo($employeeId, $em_firstName, $em_lastName, $em_mobileNumber, $em_telNumber, $em_country, $em_region, $em_town, $em_kebele);
echo $res6;

header("location: success.php?msg='Updated to '");
exit;
?>
