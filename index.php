<?php
$pageTitle = "Leave Manager";
include_once "includes/header.php";

?>
<div class="flex flex-col p-12 bg-gray-300 h-screen justify-center items-center">
    <h1 class="text-5xl font-bold my-4">Welcome to Leave Manager</h1>
    <p class="text-green-800 my-3 text-xl">Here you can manage your leave requests and view your leave history.</p>
    <div class="flex-flex-col w-full flex flex-col items-center py-8">
        <p class="text-2xl font-bold">Choose your Role</p>
        <div class="w-1/2 my-3 flex justify-center">
            <a class="mx-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                href="./auth/admin_login.php">
                Admin
            </a>
            <a class="mx-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                href="./auth/employee_login.php">
                Employee
            </a>
        </div>
    </div>
</div>

<?php
include_once "includes/footer.php";
?>