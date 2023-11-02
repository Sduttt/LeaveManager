
<?php
include_once "./index.php";


// Fetch admin detail
$adminQry = "SELECT * FROM `admins` WHERE `id` = '$emp_admin'";
$adminQryResult = mysqli_query($conn, $adminQry);

$row = mysqli_fetch_assoc($adminQryResult);

$admin_name = $row['name'];
$admin_email = $row['email'];


?>


<div class="ml-72  mx-auto py-8">
    <div class="bg-white mr-8 shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
            <h1 class="text-2xl font-bold text-gray-700 mb-2">Employee Information</h1>
            <p class="text-gray-600 text-sm">View your employee information below.</p>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <p class="text-gray-700 font-bold">Name:</p>
                <p class="text-gray-600">
                    <?php echo $emp_name; ?>
                </p>
            </div>
            <div>
                <p class="text-gray-700 font-bold">Employee ID:</p>
                <p class="text-gray-600">
                    <?php echo $emp_id; ?>
                </p>
            </div>
            <div>
                <p class="text-gray-700 font-bold">Email:</p>
                <p class="text-gray-600">
                    <?php echo $emp_email; ?>
                </p>
            </div>
            <div>
                <p class="text-gray-700 font-bold">Designation:</p>
                <p class="text-gray-600">
                    <?php echo $emp_designation; ?>
                </p>
            </div>

        </div>
    </div>
    <div class="bg-white mr-8 shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
            <h1 class="text-2xl font-bold text-gray-700 mb-2">Admin Information</h1>
            <p class="text-gray-600 text-sm">View your admin information below.</p>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <p class="text-gray-700 font-bold">Name:</p>
                <p class="text-gray-600">
                    <?php echo $admin_name; ?>
                </p>
            </div>
            <div>
                <p class="text-gray-700 font-bold">Email:</p>
                <p class="text-gray-600">
                    <?php echo $admin_email; ?>
                </p>
            </div>
        </div>
    </div>


</div>