<?php

session_start();
$_SESSION['svid'] = 2;
$svid = $_SESSION['svid'];

include 'config.php';

// get the post records
$vname = $_POST['vname'];
$nric = $_POST['nric'];
$vehicle = $_POST['vehicle'];
$mob = $_POST['mob'];
$date = $_POST['date'];
$stime = $_POST['stime'];
$etime = $_POST['etime'];

// database insert SQL code
$sql = "INSERT INTO `visitor` (`Resident_svID`, `Visitor_Name`, `IC_No/Passport_No`, `Vehicle_No`, `Phone_No`, `Date`, `Start_Time`, `End_Time`) 
    VALUES ('$svid', '$vname', '$nric', '$vehicle', '$mob', '$date', '$stime', '$etime')";

// insert in database 
$rs = mysqli_query($mysqli, $sql);

if($rs)
{
	echo "Records Inserted";
    header("Location:../visitor-pass/registerVisitorSuccess.html"); 
}

?>