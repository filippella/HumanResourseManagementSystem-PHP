<?php

class MysqlDB {

    protected $connect;
    protected $_where = array();
    protected $_query;
    protected $_paramTypeList;
    protected $host, $username, $password, $db;

    public function __construct() {
        $this->host = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->db = "hrms";

        $this->connect = mysql_connect($this->host, $this->username, $this->password) or die('There was a problem connecting to the database');
        $this->createDatabase();
        $this->selectDatabase();
        $this->createTable();
    }

    private function createDatabase() {
        $queryResult = mysql_query("CREATE DATABASE `$this->db`");
        if (!$queryResult) {
            
        }
        return $queryResult;
    }

    private function selectDatabase() {
        mysql_select_db($this->db) or die('There was a problem Selecting the database');
    }

    private function createTable() {

        $query1 = "CREATE TABLE IF NOT EXISTS `UserAccount` (
            `userName` varchar(100) PRIMARY KEY NOT NULL,
            `userPassword` varchar(500) NOT NULL,
            `roleType` varchar(500) NOT NULL,  
            `status` varchar(500) NOT NULL )";

        $queryResult1 = mysql_query($query1);

        if ($queryResult1) {
            mysql_query("INSERT INTO `UserAccount` values ('administrator','admin','admin','enabled')");
            mysql_query("INSERT INTO `UserAccount` values ('hidden_administrator','admin','admin','enabled')");
        } else {
            echo mysql_error();
        }

        $query21 = "CREATE TABLE IF NOT EXISTS `EmployeeUserAccount` (
            `userName` varchar(100) PRIMARY KEY NOT NULL,
            `userPassword` varchar(500) NOT NULL,
            `roleType` varchar(500) NOT NULL,  
            `status` varchar(500) NOT NULL )";

        $queryResult21 = mysql_query($query21);

        if (!$queryResult21) {
            
        }

        $query213 = "CREATE TABLE IF NOT EXISTS `ClearkUserAccount` (
            `userName` varchar(100) PRIMARY KEY NOT NULL,
            `userPassword` varchar(500) NOT NULL,
            `roleType` varchar(500) NOT NULL,  
            `status` varchar(500) NOT NULL )";

        $queryResult213 = mysql_query($query213);

        if (!$queryResult213) {
            
        }


        $query2 = "CREATE TABLE IF NOT EXISTS `EmployeeGeneralInformation` (
            `empID` varchar(100) PRIMARY KEY NOT NULL,
            `firstName` varchar(500) NOT NULL,
            `lastName` varchar(500) NOT NULL,  
            `gender` varchar(500) NOT NULL, 
            `empImageData` LONGBLOB NOT NULL, 
            `vacCode` varchar(500) NOT NULL )";

        $queryResult2 = mysql_query($query2);
        if (!$queryResult2) {
            
        }

        $query3 = "CREATE TABLE IF NOT EXISTS `EmployeeContactInformation` (
            `empID` varchar(100) PRIMARY KEY NOT NULL,
            `mobileNumber` varchar(500) NOT NULL,
            `telephoneNumber` varchar(500) NOT NULL,  
            `country` varchar(500) NOT NULL, 
            `town` varchar(500) NOT NULL,
            foreign key (empID) references EmployeeGeneralInformation (empID) ON DELETE CASCADE)";

        $queryResult3 = mysql_query($query3);
        if (!$queryResult3) {
            
        }

        $query4 = "CREATE TABLE IF NOT EXISTS `EmployeeAddressInformation` (
            `empID` varchar(100) PRIMARY KEY NOT NULL,
            `email` varchar(500) NOT NULL,
            `region` varchar(500) NOT NULL,  
            `subcity` varchar(500) NOT NULL, 
            `woreda` varchar(500) NOT NULL,
            `kebele` varchar(500) NOT NULL,
            `houseNumber` varchar(500) NOT NULL,
            foreign key (empID) references EmployeeGeneralInformation (empID) ON DELETE CASCADE)";

        $queryResult4 = mysql_query($query4);
        if (!$queryResult4) {
            
        }


        $query5 = "CREATE TABLE IF NOT EXISTS `EmployeePersonalInformation` (
            `empID` varchar(100) PRIMARY KEY NOT NULL,
            `dateOfBirth` varchar(500) NOT NULL,
            `maritalStatus` varchar(500) NOT NULL,  
            `motherName` varchar(500) NOT NULL, 
            `numberOfSon` varchar(500) NOT NULL,
            `numberOfDaughter` varchar(500) NOT NULL,
            foreign key (empID) references EmployeeGeneralInformation (empID) ON DELETE CASCADE)";

        $queryResult5 = mysql_query($query5);
        if (!$queryResult5) {
            
        }

        $query6 = "CREATE TABLE IF NOT EXISTS `EmployeeEmploymentInformation` (
            `empID` varchar(100) PRIMARY KEY NOT NULL,
            `employmentDate` varchar(500) NOT NULL,
            `employeeJobTitle` varchar(500) NOT NULL,  
            `startingSalary` varchar(500) NOT NULL, 
            `currentSalary` varchar(500) NOT NULL,
            `pensionIdentityNumber` varchar(500) NOT NULL,
            `tinNumber` varchar(500) NOT NULL,
            `department` varchar(500) NOT NULL,
            `membership` varchar(500) NOT NULL,
            `jobStatus` varchar(500) NOT NULL,
            `status` varchar(500) NOT NULL,
            foreign key (empID) references EmployeeGeneralInformation (empID) ON DELETE CASCADE)";

        $queryResult6 = mysql_query($query6);
        if (!$queryResult6) {
            
        }


        $query7 = "CREATE TABLE IF NOT EXISTS `EmployeeEmergencyContactInformation` (
            `empID` varchar(100) PRIMARY KEY NOT NULL,
            `firstName` varchar(500) NOT NULL,
            `lastName` varchar(500) NOT NULL,  
            `mobileNumber` varchar(500) NOT NULL, 
            `telNumber` varchar(500) NOT NULL,
            `country` varchar(500) NOT NULL,
            `region` varchar(500) NOT NULL,
            `town` varchar(500) NOT NULL,
            `kebele` varchar(500) NOT NULL,
            foreign key (empID) references EmployeeGeneralInformation (empID) ON DELETE CASCADE)";

        $queryResult7 = mysql_query($query7);
        if (!$queryResult7) {
            
        }

        $query8 = "CREATE TABLE IF NOT EXISTS `EmployeeRecruitment` (
            `vacCode` varchar(100) PRIMARY KEY,
            `vacName` varchar(500) NOT NULL,
            `vacDepartment` varchar(500) NOT NULL,  
            `openDate` varchar(500) NOT NULL, 
            `closeDate` varchar(500) NOT NULL,
            `requiredNumber` varchar(500) NOT NULL,
            `salary` varchar(500) NOT NULL,
            `detailVacancy` text NOT NULL,
            `recruitmentNotice` text NOT NULL )";

        $queryResult8 = mysql_query($query8);
        if (!$queryResult8) {
            
        }

        $query9 = "CREATE TABLE IF NOT EXISTS `EmployeePension` (
            `empID` varchar(100) PRIMARY KEY NOT NULL,
            `staffType` varchar(500) NOT NULL,
            `currentSalary` varchar(500) NOT NULL,  
            `dob` varchar(500) NOT NULL, 
            `age` varchar(500) NOT NULL,
            `hiredDate` varchar(500) NOT NULL,
            `retiredDate` varchar(500) NOT NULL,
            `retirementSalary` text NOT NULL,
            `experience` text NOT NULL,            
            foreign key (empID) references EmployeeGeneralInformation (empID) ON DELETE CASCADE)";

        $queryResult9 = mysql_query($query9);
        if (!$queryResult9) {
            
        }


        $query10 = "CREATE TABLE IF NOT EXISTS `ClientApplications` (
            `empID` varchar(100) PRIMARY KEY NOT NULL,
            `VacCode` varchar(500) NOT NULL,
            `firstName` varchar(500) NOT NULL,  
            `lastName` varchar(500) NOT NULL, 
            `sex` varchar(500) NOT NULL,
            `applicationDate` varchar(500) NOT NULL,
            `gpa` varchar(500) NOT NULL,
            `experience` text NOT NULL,
            foreign key (VacCode) references EmployeeRecruitment (VacCode) ON DELETE CASCADE)";

        $queryResult10 = mysql_query($query10);
        if (!$queryResult10) {
            
        }

        $query11 = "CREATE TABLE IF NOT EXISTS `EmployeeSkillGap` (
            `skillID` INT(11) NOT NULL AUTO_INCREMENT,
            `empID` varchar(100) NOT NULL,
            `skillGapRequested` varchar(500) NOT NULL,
            `date` varchar(500) NOT NULL,
            PRIMARY KEY (`skillID`, `empID`),
            foreign key (empID) references EmployeeGeneralInformation (empID) ON DELETE CASCADE)";

        $queryResult11 = mysql_query($query11);
        if (!$queryResult11) {
            
        }


        $query12 = "CREATE TABLE IF NOT EXISTS `EmployeeTrainingAgreementForm` (
            `trainingID` INT(11) NOT NULL AUTO_INCREMENT,
            `empID` varchar(100) NOT NULL,
            `currentSalary` varchar(100) NOT NULL,
            `qualification` varchar(100) NOT NULL,
            `guarantee` varchar(100) NOT NULL,
            `trainingType` varchar(100) NOT NULL,
            `trainingDurationFrom` varchar(100) NOT NULL,
            `trainingDurationTo` varchar(100) NOT NULL,
            `trainingBudget` varchar(100) NOT NULL,
            `contractProvider` varchar(100) NOT NULL,
            `approveStatus` varchar(100) NOT NULL,            
            PRIMARY KEY (`trainingID`, `empID`),
            foreign key (empID) references EmployeeGeneralInformation (empID) ON DELETE CASCADE)";

        $queryResult12 = mysql_query($query12);
        if (!$queryResult12) {
            
        }


        $query13 = "CREATE TABLE IF NOT EXISTS `EmployeeAppraisal` (
            `empID` varchar(100) NOT NULL,
            `academicYear` varchar(100) NOT NULL,
            `durationFrom` varchar(100) NOT NULL,
            `durationTo` varchar(100) NOT NULL,
            `staffType` varchar(100) NOT NULL,
            `academicEvaluation` varchar(100) NOT NULL,
            `technologyTransfer` varchar(100) NOT NULL,
            `industrialExtension` varchar(100) NOT NULL,
            `financeDepartment` varchar(100) NOT NULL,
            `hrmDepartment` varchar(100) NOT NULL,
            `totalScore` varchar(100) NOT NULL,
            `evaluatedBy` varchar(100) NOT NULL,
            `carrierStatus` varchar(100) NOT NULL,
            `yr` varchar(100) NOT NULL,
            `date` varchar(100)PRIMARY KEY  NOT NULL,
            foreign key (empID) references EmployeeGeneralInformation (empID) ON DELETE CASCADE)";

        $queryResult13 = mysql_query($query13);
        if (!$queryResult13) {
            
        }

        $query14 = "CREATE TABLE IF NOT EXISTS `EmployeeLeaveRequest` (
            `leaveID` INT(11) NOT NULL AUTO_INCREMENT,
            `empID` varchar(100) NOT NULL,
            `staffType` varchar(500) NOT NULL,
            `leaveType` varchar(500) NOT NULL,
            `requestFrom` varchar(500) NOT NULL,
            `requestTo` varchar(500) NOT NULL,
            `leaveReason` text NOT NULL,
            `status` varchar(500) NOT NULL,
            `requestDate` varchar(500) NOT NULL,
            PRIMARY KEY (`leaveID`, `empID`),
            foreign key (empID) references EmployeeGeneralInformation (empID) ON DELETE CASCADE)";

        $queryResult14 = mysql_query($query14);
        if (!$queryResult14) {
            
        }


        $query15 = "CREATE TABLE IF NOT EXISTS `TrainingPlan` (
            `planID` INT(11) NOT NULL AUTO_INCREMENT,
            `empID` varchar(100) NOT NULL,
            `plannedTraining` varchar(500) NOT NULL,
            `numberOfParticipant` varchar(500) NOT NULL,
            `date` varchar(500) NOT NULL,            
            PRIMARY KEY (`planID`, `empID`),
            foreign key (empID) references EmployeeGeneralInformation (empID) ON DELETE CASCADE)";

        $queryResult15 = mysql_query($query15);
        if (!$queryResult15) {
            
        }


        $query16 = "CREATE TABLE IF NOT EXISTS `EmployeePromotionDemotion` (
            `empID` varchar(100) NOT NULL,
            `currentCarrierStatus` varchar(500) NOT NULL,
            `currentSalary` varchar(500) NOT NULL,  
            `staffType` varchar(500) NOT NULL, 
            `processType` varchar(500) NOT NULL,
            `toPrDm` varchar(500) NOT NULL,
            `date` varchar(500) NOT NULL,
            `reason1` text NOT NULL,
            foreign key (empID) references EmployeeGeneralInformation (empID) ON DELETE CASCADE)";

        $queryResult16 = mysql_query($query16);
        if (!$queryResult16) {
            
        }

        $query17 = "CREATE TABLE IF NOT EXISTS `EmployeeSecondRoundResult` (
            `empID` varchar(100) NOT NULL,
            `vacCode` varchar(500) NOT NULL,
            `examResult` varchar(500) NOT NULL,
            `interviewResult` varchar(500) NOT NULL,
            `total` varchar(500) NOT NULL,            
            foreign key (VacCode) references EmployeeRecruitment (VacCode) ON DELETE CASCADE)";

        $queryResult17 = mysql_query($query17);
        if (!$queryResult17) {
            
        }
    }

    public function verifyPassword($user, $pass, $userT) {

        $query = "";

        if ($userT == "admin") {
            $query = "select * from UserAccount where userName = '$user' and userPassword = '$pass' and roleType = '$userT'";
        } else if ($userT == "employee") {
            $query = "select * from EmployeeUserAccount where userName = '$user' and userPassword = '$pass' and roleType = '$userT'";
        } else if ($userT == "HRM Clerk") {
            $query = "select * from ClearkUserAccount where userName = '$user' and userPassword = '$pass' and roleType = '$userT'";
        }

        $result = mysql_query($query);

        $numResult = 0;

        if ($result) {
            $numResult = mysql_num_rows($result);
        }
        return $numResult;
    }

    public function createAdminAccountInformation($userName, $userPassword, $roleType, $status) {
        $st = 1;
        $query = mysql_query("INSERT INTO `UserAccount` values ('$userName','$userPassword','$roleType','$status')");

        if (!$query) {
            $st = 0;
        }
        return $st;
    }

    public function createEmployeeAccountInformation($userName, $userPassword, $roleType, $status) {
        $st = 1;
        $query = mysql_query("INSERT INTO `EmployeeUserAccount` values ('$userName','$userPassword','$roleType','$status')");
        if (!$query) {
            $st = 0;
        }
        return $st;
    }

    public function createClearkAccountInformation($userName, $userPassword, $roleType, $status) {
        $st = 1;
        $query = mysql_query("INSERT INTO `ClearkUserAccount` values ('$userName','$userPassword','$roleType','$status')");
        if (!$query) {
            $st = 0;
        }
        return $st;
    }

    public function saveEmployeeGeneralInfo($employeeId, $employeeFisrtName, $employeeLastName, $gender, $image, $vacCode) {

        if ($image === "NO") {

            $sql = "INSERT INTO EmployeeGeneralInformation (empID, firstName,
                lastName,gender,vacCode) VALUES ('$employeeId','$employeeFisrtName','$employeeLastName','$gender','$vacCode')";

            mysql_query($sql) or die(mysql_error());
            $msg = " Data successfully uploaded";
        } else {
            $maxFileSize = "10000000";
            $image_array = array("image/jpeg", "image/jpg", "image/gif", "image/bmp", "image/pjpeg", "image/png"); // valid image type
            $fileType = $image['type'];

            $msg = '';

            if (in_array($fileType, $image_array)) {

                if (is_uploaded_file($image['tmp_name'])) {

                    if ($image['size'] < $maxFileSize) {
                        $imageData = addslashes(file_get_contents($image['tmp_name']));

                        $sql = "INSERT INTO EmployeeGeneralInformation (empID, firstName,
                lastName,gender,empImageData,vacCode) VALUES ('$employeeId','$employeeFisrtName','$employeeLastName','$gender','$imageData','$vacCode')";

                        mysql_query($sql) or die(mysql_error());
                        $msg = " Data successfully uploaded";
                    } else {

                        $msg = ' Error :  File size exceeds the maximum limit ';
                    }
                }
            } else {
                $msg = 'Error: Not a valid image ' . mysql_error();
            }
        }



        return $msg;
    }

    public function updateEmployeeGeneralInfo($employeeId, $employeeFisrtName, $employeeLastName, $gender, $image, $vacCode) {

        $maxFileSize = "10000000";
        $image_array = array("image/jpeg", "image/jpg", "image/gif", "image/bmp", "image/pjpeg", "image/png"); // valid image type

        $msg = '';

        if ($image === "NO") {

            $sql = "UPDATE EmployeeGeneralInformation set firstName = '$employeeFisrtName' ,
                lastName = '$employeeLastName',gender = '$gender' , vacCode = '$vacCode'
            where empID = '$employeeId'";

            mysql_query($sql) or die(mysql_error());
            $msg = " Data successfully uploaded";
        } else {
            $fileType = $image['type'];

            if (in_array($fileType, $image_array)) {

                if (is_uploaded_file($image['tmp_name'])) {

                    if ($image['size'] < $maxFileSize) {
                        $imageData = addslashes(file_get_contents($image['tmp_name']));

                        $sql = "UPDATE EmployeeGeneralInformation set firstName = '$employeeFisrtName' ,
                lastName = '$employeeLastName',gender = '$gender' , vacCode = '$vacCode', empImageData = '$imageData'
            where empID = '$employeeId'";

                        mysql_query($sql) or die(mysql_error());
                        $msg = " Data Changed uploaded";
                    } else {

                        $msg = ' Error :  File size exceeds the maximum limit ';
                    }
                }
            } else {
                $msg = 'Error: Not a valid image ' . mysql_error();
            }
        }

        return $msg;
    }

    public function saveEmployeeContactInfo($employeeId, $mobileNumber, $telephoneNumber, $country, $town) {

        $status = 1;

        $query1 = mysql_query("INSERT INTO `EmployeeContactInformation`(empID, mobileNumber, telephoneNumber, country, town)
            values ('$employeeId','$mobileNumber','$telephoneNumber','$country','$town')");
        if (!$query1) {
            $status = 0;
        }
        return $status;
    }

    public function updateEmployeeContactInfo($employeeId, $mobileNumber, $telephoneNumber, $country, $town) {

        $status = 1;

        $query1 = mysql_query("UPDATE `EmployeeContactInformation` set mobileNumber = '$mobileNumber', telephoneNumber = '$telephoneNumber',
                country = '$country', town = '$town' where empID = '$employeeId'");
        if (!$query1) {
            $status = 0;
        }
        return $status;
    }

    public function saveEmployeeAdrressInfo($employeeId, $email, $region, $subcity, $woreda, $kebele, $houseNumber) {

        $status = 1;

        $query1 = mysql_query("INSERT INTO `EmployeeAddressInformation`(empID, email, region, subcity,
                woreda, kebele, houseNumber) values ('$employeeId','$email','$region','$subcity','$woreda','$kebele','$houseNumber')");
        if (!$query1) {
            $status = 0;
        }
        return $status;
    }

    public function updateEmployeeAdrressInfo($employeeId, $email, $region, $subcity, $woreda, $kebele, $houseNumber) {

        $status = 1;

        $query1 = mysql_query("UPDATE `EmployeeAddressInformation` set email = '$email', region = '$region', subcity = '$subcity',
                woreda = '$woreda', kebele = '$kebele', houseNumber = '$houseNumber' where empID = '$employeeId'");
        if (!$query1) {
            $status = 0;
        }
        return $status;
    }

    public function saveEmployeePersonalInfo($employeeId, $dateOfBirth, $maritalStatus, $motherName, $numberOfSon, $numberOfDaughter) {

        $status = 1;

        $query1 = mysql_query("INSERT INTO `EmployeePersonalInformation`(empID, dateOfBirth, maritalStatus, motherName,
                numberOfSon, numberOfDaughter) values ('$employeeId','$dateOfBirth','$maritalStatus','$motherName','$numberOfSon','$numberOfDaughter')");
        if (!$query1) {
            $status = 0;
        }
        return $status;
    }

    public function updateEmployeePersonalInfo($employeeId, $dateOfBirth, $maritalStatus, $motherName, $numberOfSon, $numberOfDaughter) {

        $status = 1;

        $query1 = mysql_query("UPDATE `EmployeePersonalInformation` set dateOfBirth = '$dateOfBirth', maritalStatus = '$maritalStatus', motherName = '$motherName',
                numberOfSon = '$numberOfSon', numberOfDaughter = '$numberOfDaughter' where empID = '$employeeId'");
        if (!$query1) {
            $status = 0;
        }
        return $status;
    }

    public function saveEmployeeEmploymentInfo($employeeId, $employmentDate, $employeeJobTitle, $startingSalary, $currentSalary, $pensionIdentityNumber, $tinNumber, $department, $membership, $jobStatus, $status) {

        $s = 1;

        $query1 = mysql_query("INSERT INTO `EmployeeEmploymentInformation`(empID, employmentDate, employeeJobTitle, startingSalary,
                currentSalary, pensionIdentityNumber, tinNumber, department, membership, jobStatus, status) values ('$employeeId','$employmentDate','$employeeJobTitle','$startingSalary','$currentSalary',
                '$pensionIdentityNumber','$tinNumber','$department','$membership','$jobStatus','$status')");
        if (!$query1) {
            $s = 0;
        }
        return $s;
    }

    public function updateEmployeeEmploymentInfo($employeeId, $employmentDate, $employeeJobTitle, $startingSalary, $currentSalary, $pensionIdentityNumber, $tinNumber, $department, $membership, $jobStatus, $status) {

        $s = 1;

        $query1 = mysql_query("UPDATE `EmployeeEmploymentInformation` set employmentDate = '$employmentDate', employeeJobTitle = '$employeeJobTitle', startingSalary = '$startingSalary',
                currentSalary = '$currentSalary', pensionIdentityNumber = '$pensionIdentityNumber', tinNumber = '$tinNumber', department = '$department', membership = '$membership',
                jobStatus = '$jobStatus', status = '$status' where empID = '$employeeId'");
        if (!$query1) {
            $s = 0;
        }
        return $s;
    }

    public function saveEmployeeEmergencyContactInfo($employeeId, $em_firstName, $em_lastName, $em_mobileNumber, $em_telNumber, $em_country, $em_region, $em_town, $em_kebele) {

        $status = 1;

        $query1 = mysql_query("INSERT INTO `EmployeeEmergencyContactInformation`(empID, firstName, lastName, mobileNumber,
                telNumber, country, region, town, kebele) values ('$employeeId','$em_firstName','$em_lastName','$em_mobileNumber','$em_telNumber','$em_country','$em_region','$em_town','$em_kebele')");
        if (!$query1) {
            $status = 0;
        }
        return $status;
    }

    public function updateEmployeeEmergencyContactInfo($employeeId, $em_firstName, $em_lastName, $em_mobileNumber, $em_telNumber, $em_country, $em_region, $em_town, $em_kebele) {

        $status = 1;

        $query1 = mysql_query("UPDATE `EmployeeEmergencyContactInformation` set firstName ='$em_firstName', lastName = '$em_lastName', mobileNumber = '$em_mobileNumber',
                telNumber = '$em_telNumber', country = '$em_country', region = '$em_region', town = '$em_town', kebele = '$em_kebele'  where empID = '$employeeId'");
        if (!$query1) {
            $status = 0;
        }
        return $status;
    }

    public function saveRecruitment($vacCode, $vacName, $vacDepartment, $openDate, $closeDate, $requiredNumber, $salary, $detailVacancy, $recruitmentNotice) {

        $status = 1;

        $query1 = mysql_query("INSERT INTO `EmployeeRecruitment`(vacCode, vacName, vacDepartment, openDate,
                closeDate, requiredNumber, salary, detailVacancy, recruitmentNotice) values ('$vacCode','$vacName','$vacDepartment','$openDate','$closeDate',
                '$requiredNumber','$salary','$detailVacancy','$recruitmentNotice')");
        if (!$query1) {
            $status = 0;
        }
        return $status;
    }

    public function savePension($empID, $staffType, $currentSalary, $dob, $age, $hiredDate, $retiredDate, $retirementSalary, $experience) {

        $status = 1;

        $query1 = mysql_query("INSERT INTO `EmployeePension`(empID, staffType, currentSalary, dob,
                age, hiredDate, retiredDate, retirementSalary, experience) values ('$empID','$staffType','$currentSalary','$dob','$age',
                '$hiredDate','$retiredDate','$retirementSalary','$experience')");
        if (!$query1) {
            $status = 0;
        }
        return $status;
    }

    public function saveClientApplication($empID, $vacCode, $firstName, $lastName, $sex, $date, $gpa, $experience) {

        $status = 1;

        $query1 = mysql_query("INSERT INTO `ClientApplications`(empID, VacCode, firstName, lastName,
                sex, applicationDate, gpa, experience) values ('$empID','$vacCode','$firstName','$lastName','$sex',
                '$date','$gpa','$experience')");
        if (!$query1) {
            $status = 0;
        }
        return $status;
    }

    public function saveEmployeeSkillGap($empID, $skillGapRequested, $date) {

        $status = 1;

        $query1 = mysql_query("INSERT INTO `EmployeeSkillGap`(empID, skillGapRequested, date) values ('$empID','$skillGapRequested',
                '$date')");
        if (!$query1) {
            $status = 0;
        }
        return $status;
    }

    public function saveEmployeeTrainingAgreement($empID, $currentSalary, $qualification, $guarantee, $trainingType, $trainingDurationFrom, $trainingDurationTo, $trainingBudget, $contractProvider) {

        $status = 1;

        $query1 = mysql_query("INSERT INTO `EmployeeTrainingAgreementForm` (empID, currentSalary, qualification,
                guarantee, trainingType, trainingDurationFrom, trainingDurationTo, trainingBudget, contractProvider, approveStatus) values ('$empID',
                '$currentSalary','$qualification','$guarantee','$trainingType','$trainingDurationFrom','$trainingDurationTo','$trainingBudget','$contractProvider','NO')");
        if (!$query1) {
            $status = 0;
        }
        return $status;
    }

    public function approveEmployeeAgreementStatus($empID) {

        $status = 1;

        $query1 = mysql_query("UPDATE `EmployeeTrainingAgreementForm` set approveStatus ='YES' where empID = '$empID'");
        if (!$query1) {
            $status = 0;
        }
        return $status;
    }

    public function disproveEmployeeAgreementStatus($empID) {

        $status = 1;

        $query1 = mysql_query("UPDATE `EmployeeTrainingAgreementForm` set approveStatus ='NO' where empID = '$empID'");
        if (!$query1) {
            $status = 0;
        }
        return $status;
    }

    public function approveLeaveAgreementStatus($empID) {

        $status = 1;

        $query1 = mysql_query("UPDATE `EmployeeLeaveRequest` set status ='YES' where empID = '$empID'");
        if (!$query1) {
            $status = 0;
        }
        return $status;
    }

    public function disproveLeaveAgreementStatus($empID) {

        $status = 1;

        $query1 = mysql_query("UPDATE `EmployeeLeaveRequest` set status ='NO' where empID = '$empID'");
        if (!$query1) {
            $status = 0;
        }
        return $status;
    }

    public function saveEmployeeAppraisal($empID, $academicYear, $durationFrom, $durationTo, $staffType, $academicEvaluation, $technologyTransfer, $industrialExtension, $financeDepartment, $hrmDepartment, $totalScore, $evaluatedBy, $carrierStatus, $yr) {

        $status = 1;

        $date = date("l, d-M-y H:i:s");

        $query1 = mysql_query("INSERT INTO `EmployeeAppraisal` (empID, academicYear, durationFrom,
                durationTo, staffType, academicEvaluation, technologyTransfer, industrialExtension, financeDepartment,
                hrmDepartment, totalScore, evaluatedBy, carrierStatus, yr, date) values ('$empID',
                '$academicYear','$durationFrom','$durationTo','$staffType','$academicEvaluation','$technologyTransfer',
                '$industrialExtension','$financeDepartment','$hrmDepartment','$totalScore','$evaluatedBy','$carrierStatus','$yr','$date')");
        if (!$query1) {
            $status = 0;
        }
        return $status;
    }

    public function saveEmployeeLeave($empID, $staffType, $leaveType, $requestFrom, $requestTo, $leaveReason, $requestDate) {

        $status = 1;

        $query1 = mysql_query("INSERT INTO `EmployeeLeaveRequest`(empID, staffType,leaveType,requestFrom,requestTo,leaveReason,status, requestDate) values (
                '$empID','$staffType','$leaveType','$requestFrom','$requestTo','$leaveReason','NO','$requestDate')");
        if (!$query1) {
            $status = 0;
        }
        return $status;
    }

    public function saveTrainingPlan($empID, $plannedTraining, $numberOfParticipant) {

        $status = 1;
        $date = date("l, d-M-y H:i:s");

        $query1 = mysql_query("INSERT INTO `TrainingPlan`(empID, plannedTraining,numberOfParticipant, date) values (
                '$empID','$plannedTraining','$numberOfParticipant', '$date')");
        if (!$query1) {
            $status = 0;
        }
        return $status;
    }

    public function sortFirstRoundClientApplication($vac) {

        $ee = mysql_query("DELETE FROM FirstRoundResult");
        if (!$ee) {
            echo mysql_error();
        }


        $query = mysql_query("SELECT * FROM `clientapplications` where `VacCode` = '$vac'");

        if ($query) {

            $i = 0;

            while ($row = mysql_fetch_array($query)) {
                $i++;

                $empID = $row['empID'];
                $firstName = $row['firstName'];
                $lastName = $row['lastName'];
                $sex = $row['sex'];
                $applicationDate = $row['applicationDate'];
                $gpa = $row['gpa'];
                $experience = $row['experience'];


                $gpaPoint = "";

                if (($gpa >= 2) && ($gpa <= 2.5)) {
                    $gpaPoint = 30;
                } else if (($gpa >= 2.5) && ($gpa <= 3)) {
                    $gpaPoint = 40;
                } else if (($gpa >= 3) && ($gpa <= 3.5)) {
                    $gpaPoint = 50;
                } else if (($gpa >= 3.5) && ($gpa <= 4)) {
                    $gpaPoint = 60;
                }

                $expPoint = "";

                if (($experience >= 0) && ($experience <= 2)) {
                    $expPoint = 5;
                } else if (($experience >= 2) && ($experience <= 10)) {
                    $expPoint = 10;
                } else if (($experience >= 10) && ($experience <= 15)) {
                    $expPoint = 25;
                } else if (($experience >= 15) && ($experience <= 20)) {
                    $expPoint = 30;
                } else if ($experience > 20) {
                    $expPoint = 40;
                }

                $totPoint = $gpaPoint + $expPoint;

                if ($totPoint == 100) {
                    $totPoint = 99.9;
                }



                $query2 = "CREATE TABLE IF NOT EXISTS `FirstRoundResult` (
            `empID` varchar(100) PRIMARY KEY NOT NULL,
            `vacCode` varchar(100),
            `firstName` varchar(500) NOT NULL,
            `lastName` varchar(500) NOT NULL,  
            `sex` varchar(500) NOT NULL, 
            `applicationDate` varchar(500) NOT NULL,
            `gpa` varchar(500) NOT NULL,
            `experience` varchar(500) NOT NULL,
            `totalPoint` varchar(500) NOT NULL)";

                $queryResult2 = mysql_query($query2);
                if (!$queryResult2) {
                    
                }

                $queryInsert = mysql_query("INSERT INTO FirstRoundResult (empID,vacCode,firstName,
    lastName,sex,applicationDate,gpa,experience,totalPoint) values ('$empID','$vac','$firstName','$lastName','$sex','$applicationDate','$gpa','$experience','$totPoint')");

                if (!$queryInsert) {
                    echo mysql_error();
                }
            }
        } else {
            echo mysql_error();
        }
    }

    public function savePromotionDemotion($empID, $currentCarrierStatus, $currentSalary, $staffType, $processType, $to, $rs) {

        $status = 1;
        $date = date("l, d-M-y H:i:s");

        $query1 = mysql_query("INSERT INTO `EmployeePromotionDemotion`(empID, currentCarrierStatus
                ,currentSalary,staffType,processType,toPrDm,date,reason1) values (
                '$empID','$currentCarrierStatus','$currentSalary','$staffType','$processType','$to','$date','$rs')");
        if (!$query1) {
            $status = 0;
        }
        return $status;
    }

    public function saveSecondRound($empID, $vacCode, $examResult, $interviewResult) {

        $status = 1;
        $total = $examResult + $interviewResult;
        if ($total == 100) {
            $total = 99.9;
        }

        $query1 = mysql_query("INSERT INTO `EmployeeSecondRoundResult`(empID, vacCode ,examResult,interviewResult, total)
                values ('$empID','$vacCode','$examResult','$interviewResult','$total')");
        if (!$query1) {
            $status = 0;
        }
        return $status;
    }

}

