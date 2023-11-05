<?php

include '../../utils/dbconnect.php';

$empId = $_GET['id'];

$employeesD = "DELETE FROM employees WHERE employeeID = '$empId'";
$empAuthD = "DELETE FROM employee_auth WHERE employeeID = '$empId'";
$leaveAccD = "DELETE FROM leave_account WHERE employeeID = '$empId'";
$leaveD = "DELETE FROM leave_details WHERE employeeID = '$empId'";

$employeesDResult = mysqli_query($conn, $employeesD);
$empAuthDResult = mysqli_query($conn, $empAuthD);
$leaveAccDResult = mysqli_query($conn, $leaveAccD);
$leaveDResult = mysqli_query($conn, $leaveD);

if ($employeesDResult && $empAuthDResult && $leaveAccDResult && $leaveDResult) {
    header("Location: ../employees.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
