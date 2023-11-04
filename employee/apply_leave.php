<?php
include_once "./index.php";
?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $total_days = $_POST['total_days'];
    $leave_type = $_POST['leave_type'];
    $reason = $_POST['reason'];

    $errorFields = [];

    if (empty($start_date)) {
        $errorFields[] = 'Start Date';
    }
    if (empty($end_date)) {
        $errorFields[] = 'End Date';
    }
    if (empty($total_days)) {
        $errorFields[] = 'Total Days';
    }
    if (empty($leave_type)) {
        $errorFields[] = 'Leave Type';
    }
    if (empty($reason)) {
        $errorFields[] = 'Reason';
    }

    if (!empty($errorFields)) {
        $errorMessage = 'Please fill the following fields: ' . implode(', ', $errorFields);
        echo '<div class="text-right bg-red-100 border-t border-b border-red-500 text-red-700 px-4 py-3 " role="alert">
        <p class="font-semibold text-sm">' . $errorMessage . '</p>
        </div>';
    } else {
        $employeeID = $emp_id;
        $adminID = $emp_admin;
        $insertLeave = "INSERT INTO `leave_details` (`employeeID`, `adminID`, `start_date`, `end_date`, `total_days`, `type`, `reason`, `isApproved`, `isRejected`) VALUES ('$employeeID', '$adminID', '$start_date', '$end_date', '$total_days', '$leave_type', '$reason', false, false)";

        $checkAvailableLeave = "SELECT `remaining_leaves` FROM `leave_account` WHERE `employeeID` = '$employeeID'";
        $checkAvailableLeaveResult = mysqli_query($conn, $checkAvailableLeave);
        while ($row = mysqli_fetch_assoc($checkAvailableLeaveResult)) {
            $availableLeaves = $row['remaining_leaves'];
        }

        $updateLeaveAccount = "UPDATE `leave_account` SET `remaining_leaves` = `remaining_leaves` - '$total_days', `pending_leaves` = `pending_leaves` + '$total_days' WHERE `employeeID` = '$employeeID'";

        $insertLeaveResult = mysqli_query($conn, $insertLeave);

        if($availableLeaves >= $total_days) {
            if ($leave_type == 'paid') {
                $updateLeaveAccountResult = mysqli_query($conn, $updateLeaveAccount);
            }
    
            if ($insertLeaveResult) {
                echo '<div class="ml-72 bg-green-100 border-t border-b border-green-500 text-green-700 px-4 py-3 " role="alert">
                <p class="font-semibold text-sm">Leave applied successfully.</p>
                </div>';
                header("location: pending_leaves.php");
            } else {
                echo '<div class="ml-72 bg-red-100 border-t border-b border-red-500 text-red-700 px-4 py-3 " role="alert">
                <p class="font-semibold text-sm">Something went wrong.' . mysqli_error($conn) . '</p>
                </div>';
            }
        }
        else {
            echo '<div class="ml-72 bg-red-100 border-t border-b border-red-500 text-red-700 px-4 py-3 " role="alert">
            <p class="font-semibold text-sm">You do not have enough leaves.</p>
            </div>';
        }
    }
}


?>

<div class="max-w-md my-4 mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">

    <div class="p-8">
        <div class="uppercase tracking-wide text-xl text-indigo-500 font-semibold">Apply for Leave</div>
        <form class="mt-6" action="" method="post">
            <div>
                <label class="block text-gray-700 font-bold mb-2" for="start_date">
                    Start Date
                </label>
                <input onchange="calculateDays()"
                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="start_date" name="start_date" type="date" min="<?php echo date('Y-m-d'); ?>" required>
            </div>
            <div class="mt-4">
                <label class="block text-gray-700 font-bold mb-2" for="end_date">
                    End Date
                </label>
                <input onchange="calculateDays()"
                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="end_date" name="end_date" type="date" required>
            </div>
            <div class="mt-4">
                <label class="block text-gray-700 font-bold mb-2" for="total_days">
                    Total Days
                </label>
                <input
                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    readonly id="total_days" name="total_days" type="number" required>
            </div>
            <div class="mt-4">
                <label class="block text-gray-700 font-bold mb-2" for="leave_type">
                    Leave Type
                </label>
                <select
                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="leave_type" name="leave_type" required>
                    <option value="paid">Paid</option>
                    <option value="unpaid">Unpaid</option>
                </select>
            </div>
            <div class="mt-4">
                <label class="block text-gray-700 font-bold mb-2" for="reason">
                    Reason
                </label>
                <select
                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="reason" name="reason" required>
                    <option value="health">Health</option>
                    <option value="family">Family</option>
                    <option value="vacation">Vacation</option>
                    <option value="personal">Personal</option>
                </select>
            </div>
            <div class="mt-8">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Apply
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function calculateDays() {
        var startDate = new Date(document.getElementById('start_date').value);
        var endDate = new Date(document.getElementById('end_date').value);

        document.getElementById('end_date').min = startDate.toISOString().slice(0, 10);;


        if (endDate) {
            var diffTime = Math.abs(endDate - startDate);
            var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
            document.getElementById('total_days').value = diffDays + 1;
        }
    }
</script>