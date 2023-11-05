<?php
ob_start();
include '../../utils/dbconnect.php';

$leaveID = $_POST['leaveID'];
$action = $_POST['action'];

$leaveDetails = "SELECT `total_days`, `employeeID`, `type` FROM `leave_details` WHERE `leaveID` = '$leaveID'";
$leaveResult = mysqli_query($conn, $leaveDetails);
$leaveRow = mysqli_fetch_assoc($leaveResult);
$total_days = $leaveRow['total_days'];
$employeeID = $leaveRow['employeeID'];
$leaveType = $leaveRow['type'];

if($action === 'approve') {
    $sql = "UPDATE `leave_details` SET `isApproved`= true WHERE `leaveID` = '$leaveID'";
    if($leaveType === 'paid') {
        $sql2 = "UPDATE `leave_account` SET `used_leaves` = `used_leaves` + $total_days, `pending_leaves` = `pending_leaves` - $total_days WHERE `employeeID` = '$employeeID'";
    }
} else if($action === 'reject') {
    $sql = "UPDATE `leave_details` SET `isRejected`= true WHERE `leaveID` = '$leaveID'";
    if($leaveType === 'paid') {
        $sql2 = "UPDATE `leave_account` SET `pending_leaves` = `pending_leaves` - $total_days, `remaining_leaves` = `remaining_leaves` + '$total_days' WHERE `employeeID` = '$employeeID'";
    }
}

mysqli_query($conn, $sql);
if(isset($sql2)) {
    mysqli_query($conn, $sql2);
}

header("Location: ../leave_applications.php");
ob_end_flush();