<?php
include_once "./index.php";
?>

<div class="ml-72 my-6">
    <h1 class="text-3xl font-bold mb-4">Pending Leaves</h1>
    <p class="text-gray-600 mb-8">List of all your pending leaves</p>

    <table class="table-auto border-collapse border border-green-800">
        <thead>
            <tr>
                <th class="px-4 py-2 bg-green-800 text-white">Application Date</th>
                <th class="px-4 py-2 bg-green-800 text-white">Start Date</th>
                <th class="px-4 py-2 bg-green-800 text-white">End Date</th>
                <th class="px-4 py-2 bg-green-800 text-white">Total Leaves</th>
                <th class="px-4 py-2 bg-green-800 text-white">Type</th>
                <th class="px-4 py-2 bg-green-800 text-white">Reason</th>
                <th class="px-4 py-2 bg-green-800 text-white">Status</th>
                <th class="px-4 py-2 bg-green-800 text-white">Applied To</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $fetchLeave = "SELECT * FROM `leave_details` WHERE `employeeID` = '$emp_id' AND `isApproved` = false AND `isRejected` = false";
            $fetchLeaveResult = mysqli_query($conn, $fetchLeave);
            $admin = "SELECT `name` FROM `admins` WHERE `id` = '$emp_admin'";
            $adminResult = mysqli_query($conn, $admin);
            $adminName = mysqli_fetch_assoc($adminResult)['name'];

            if(mysqli_num_rows($fetchLeaveResult) == 0) {
                echo "<tr><td colspan='8' class='text-center'>No pending leaves available</td></tr>";
            } else {
                while ($fetchLeaveResultRow = mysqli_fetch_assoc($fetchLeaveResult)) {
                    echo "<tr>";
                    echo "<td class='border px-4 py-2'>" . $fetchLeaveResultRow['timestamp'] . "</td>";
                    echo "<td class='border px-4 py-2'>" . $fetchLeaveResultRow['start_date'] . "</td>";
                    echo "<td class='border px-4 py-2'>" . $fetchLeaveResultRow['end_date'] . "</td>";
                    echo "<td class='border px-4 py-2'>" . $fetchLeaveResultRow['total_days'] . "</td>";
                    echo "<td class='border px-4 py-2'>" . $fetchLeaveResultRow['type'] . "</td>";
                    echo "<td class='border px-4 py-2'>" . $fetchLeaveResultRow['reason'] . "</td>";
                    echo "<td class='border px-4 py-2 text-yellow-600 font-bold'>pending</td>";
                    echo "<td class='border px-4 py-2'>" . $adminName . "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
</div>