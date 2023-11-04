
<?php
include_once "./index.php";

$fetchLeave = "SELECT * FROM `leave_account` WHERE `employeeID` = '$emp_id'";
$fetchLeaveResult = mysqli_query($conn, $fetchLeave);
$fetchLeaveResult = mysqli_fetch_assoc($fetchLeaveResult);
$totalLeaves = $fetchLeaveResult['total_leaves'];
$usedLeaves = $fetchLeaveResult['used_leaves'];
$pendingLeaves = $fetchLeaveResult['pending_leaves'];
$remainingLeaves = $fetchLeaveResult['remaining_leaves'];

?>

<div class='ml-72 my-4'>
    <h1 class='text-3xl font-bold mb-4'>Leave Account</h1>
    <div class="flex flex-wrap mx-4">
        <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-4">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="text-center">
                    <p class="text-gray-600 text-lg font-bold">Total Leaves</p>
                    <p class="text-gray-900 text-3xl font-bold"><?php echo $totalLeaves ?></p>
                </div>
            </div>
        </div>
        <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-4">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="text-center">
                    <p class="text-gray-600 text-lg font-bold">Available Leaves</p>
                    <p class="text-green-500 text-3xl font-bold"><?php echo $remainingLeaves ?></p>
                </div>
            </div>
        </div>
        <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-4">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="text-center">
                    <p class="text-gray-600 text-lg font-bold">Used Leaves</p>
                    <p class="text-yellow-500 text-3xl font-bold"><?php echo $usedLeaves ?></p>
                </div>
            </div>
        </div>
        <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-4">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="text-center">
                    <p class="text-gray-600 text-lg font-bold">Pending Leaves</p>
                    <p class="text-blue-500 text-3xl font-bold"><?php echo $pendingLeaves ?></p>
                </div>
            </div>
        </div>
    </div>

