<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
include_once "./index.php";

$empId = $_GET['id'];


?>

<div class="ml-72 my-6">
    <h1 class="text-3xl font-bold mb-4">Leave History</h1>
    <p class="text-gray-600 mb-8">List of all your previous leaves</p>

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
            </tr>
        </thead>
        <tbody>
            <?php
            $fetchLeave = "SELECT * FROM leave_details WHERE employeeID = '$empId'";

            $fetchLeaveResult = mysqli_query($conn, $fetchLeave);

            if (mysqli_num_rows($fetchLeaveResult) == 0) {
                echo "<tr><td colspan='8' class='text-center'>No records found</td></tr>";
            } else {
                while ($fetchLeaveResultRow = mysqli_fetch_assoc($fetchLeaveResult)) {
                    echo "<tr>";
                    echo "<td class='border px-4 py-2'>" . $fetchLeaveResultRow['timestamp'] . "</td>";
                    echo "<td class='border px-4 py-2'>" . $fetchLeaveResultRow['start_date'] . "</td>";
                    echo "<td class='border px-4 py-2'>" . $fetchLeaveResultRow['end_date'] . "</td>";
                    echo "<td class='border px-4 py-2'>" . $fetchLeaveResultRow['total_days'] . "</td>";
                    echo "<td class='border px-4 py-2'>" . $fetchLeaveResultRow['type'] . "</td>";
                    echo "<td class='border px-4 py-2'>" . $fetchLeaveResultRow['reason'] . "</td>";
                    $status = $fetchLeaveResultRow['isApproved'] == true ? "<span class='text-green-800'>Approved</span>" : ($fetchLeaveResultRow['isRejected'] == true ? "<span class='text-red-800'>Rejected</span>" : "<span class='text-yellow-800'>Pending</span>");
                    echo "<td class='border px-4 py-2 font-bold'>" . $status . "</td>";
                    echo "</tr>";
                }
            }



            ?>

        </tbody>



    </table>
</div>