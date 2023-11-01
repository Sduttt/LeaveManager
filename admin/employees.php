<?php
session_start();
include_once "./index.php";
?>
<div class="flex flex-col mt-8 ml-72">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block  sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class=" divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                EmployeeID
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Designation
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php
                            $adminID = $_SESSION['id'];
                            $sql = "SELECT * FROM employees WHERE adminID = $adminID";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td class='px-6 uppercase py-4 whitespace-nowrap'>" . $row["employeeID"] . "</td>";
                                    echo "<td class='px-6 py-4 whitespace-nowrap'>" . $row["name"] . "</td>";
                                    echo "<td class='px-6 py-4 whitespace-nowrap'>" . $row["email"] . "</td>";
                                    echo "<td class='px-6 py-4 whitespace-nowrap'>" . $row["designation"] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4' class='px-6 py-4 whitespace-nowrap'>No employees found.</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
include_once "../includes/footer.php";