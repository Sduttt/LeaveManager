<?php
include_once "./index.php";

$empId = $_GET['id'];


$employee = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM employees WHERE employeeID = '$empId'"));
$employeeAuth = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM employee_auth WHERE employeeID = '$empId'"));
$employeeLeaves = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM leave_account WHERE employeeID = '$empId'"));

?>

<div class="ml-72 px-4">
    <div class="flex justify-end mt-4">
        <!-- <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</button> -->
        <a href="actions/delete_emp.php?id=<?php echo $empId ?>" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</a>
    </div>

    <div class="mt-8">
        <h1 class="text-2xl font-bold mb-4"><?php echo $employee['name']; ?></h1>
        <div class="flex flex-wrap mb-4">
            <div class="w-full md:w-1/2 lg:w-1/3">
                <p class="text-gray-600 font-bold">Employee ID:</p>
                <p><?php echo $employee['employeeID']; ?></p>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/3">
                <p class="text-gray-600 font-bold">Email ID:</p>
                <p><?php echo $employee['email']; ?></p>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/3">
                <p class="text-gray-600 font-bold">Designation:</p>
                <p><?php echo $employee['designation']; ?></p>
            </div>
        </div>
        <div class="flex flex-wrap mb-4">
            <div class="w-full md:w-1/2 lg:w-1/3">
                <p class="text-gray-600 font-bold">Joining Date:</p>
                <p><?php echo date('d-m-Y', strtotime($employeeAuth['timestamp'])); ?></p>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/3">
                <p class="text-gray-600 font-bold">Total Leaves:</p>
                <p><?php echo $employeeLeaves['total_leaves']; ?></p>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/3">
                <p class="text-gray-600 font-bold">Available Leaves:</p>
                <p><?php echo $employeeLeaves['remaining_leaves']; ?></p>
            </div>
        </div>
    </div>
</div>

