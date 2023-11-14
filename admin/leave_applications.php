<?php
include_once "./index.php";
?>
<div class="ml-64 flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <div class="overflow-x-auto">
                    <?php
                    $sql = "SELECT * FROM `leave_details` WHERE `adminID` = '$adminID' AND `isApproved` = false AND `isRejected` = false";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) == 0) {
                        echo '<div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
                                <p class="font-bold">No leave applications found!</p>
                                <p>Please check back later.</p>
                            </div>';
                    } else {
                    ?>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-2 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Employee ID
                                </th>
                                <th scope="col"
                                    class="px-2 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Employee Name
                                </th>
                                <th scope="col"
                                    class="px-2 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Start Date
                                </th>
                                <th scope="col"
                                    class="px-2 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    End Date
                                </th>
                                <th scope="col"
                                    class="px-2 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Total Days
                                </th>
                                <th scope="col"
                                    class="px-2 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Leave Type
                                </th>
                                <th scope="col"
                                    class="px-2 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Leave Reason
                                </th>
                                <th scope="col"
                                    class="px-2 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                $employeeID = $row['employeeID'];

                                $nameQry = "SELECT `name` FROM `employees` WHERE `employeeID` = '$employeeID'";
                                $nameQryResult = mysqli_query($conn, $nameQry);
                                while ($namerow = mysqli_fetch_assoc($nameQryResult)) {
                                    $employeeName = $namerow['name'];
                                }
                                ;

                                $startDate = $row['start_date'];
                                $endDate = $row['end_date'];
                                $totalDays = $row['total_days'];
                                $leaveType = $row['type'];
                                $leaveReason = $row['reason'];
                                echo '<tr>
                                <td class="px-2 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    ' . $employeeID . '
                                </td>
                                <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-600">
                                    ' . $employeeName . '
                                </td>
                                <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-600">
                                    ' . $startDate . '
                                </td>
                                <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-600">
                                    ' . $endDate . '
                                </td>
                                <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-600">
                                    ' . $totalDays . '
                                </td>
                                <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-600">
                                    ' . $leaveType . '
                                </td>
                                <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-600">
                                    ' . $leaveReason . '
                                </td>
                                <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-600">
                                <div class=flex">
                                <form class="flex" action="admin/actions/handle_leave.php" method="post">
                                    <input type="hidden" name="leaveID" value="' . $row['leaveID'] . '">
                                    <input type="hidden" name="action" value="approve">
                                    <input type="hidden" name="employeeID" value="' . $employeeID . '">
                                    <input type="hidden" name="startDate" value="' . $startDate . '">
                                    <input type="hidden" name="endDate" value="' . $endDate . '">
                                    <input type="hidden" name="totalDays" value="' . $totalDays . '">
                                    <input type="hidden" name="leaveType" value="' . $leaveType . '">
                                    <input type="hidden" name="leaveReason" value="' . $leaveReason . '">
                                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold text-sm py-1 px-2 rounded">
                                        Approve
                                    </button>
                                </form>

                                <form action="admin/actions/handle_leave.php" method="post">
                                    <input type="hidden" name="leaveID" value="' . $row['leaveID'] . '">
                                    <input type="hidden" name="action" value="reject">
                                    <input type="hidden" name="employeeID" value="' . $employeeID . '">
                                    <input type="hidden" name="startDate" value="' . $startDate . '">
                                    <input type="hidden" name="endDate" value="' . $endDate . '">
                                    <input type="hidden" name="totalDays" value="' . $totalDays . '">
                                    <input type="hidden" name="leaveType" value="' . $leaveType . '">
                                    <input type="hidden" name="leaveReason" value="' . $leaveReason . '">
                                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold text-sm py-1 px-2 rounded">
                                        Reject
                                    </button>
                                </form>
                                </div>

                                </td>
                                </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>