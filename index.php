<?php
$pageTitle = "Leave Manager";
include_once "includes/header.php";

?>

<div class="flex flex-col p-12 bg-gray-300 h-screen justify-center items-center
w-full
    h-screen
    bg-gradient-to-r
    from-pink-500
    via-red-500
    to-yellow-500
    background-animate
">
    <h1 class="text-5xl font-bold my-4">Welcome to Leave Manager</h1>
    <p class="text-blue-700 my-3 font-medium text-xl">Here you can manage your leave requests and view your leave history.</p>
    <div class="flex-flex-col w-full flex flex-col items-center py-8">
        <p class="text-2xl font-bold">Choose your Role</p>
        <div class="w-1/2 my-3 flex justify-center">
            <a class="mx-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md"
                href="./auth/admin_login.php">
                Admin
            </a>
            <a class="mx-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md"
                href="./auth/employee_login.php">
                Employee
            </a>
        </div>
    </div>

    <div class="flex justify-between fixed bottom-0 w-screen text-white px-8 py-6 bg-gray-500 bg-opacity-50">
        <a href="https://sduttt.netlify.app/" class="font-medium text-xl">©Subham Dutta | 2023</a>
        <div class="flex">
            <a href="https://www.linkedin.com/in/sduttt/" target="_blank" rel="noopener noreferrer">
                <img src="https://img.icons8.com/material-rounded/48/ffffff/linkedin.png" alt="LinkedIn Icon"
                    class="w-8 h-8 mx-2">
            </a>
            <a href="https://www.linkedin.com/in/sduttt/" target="_blank" rel="noopener noreferrer">
                <img src="https://img.icons8.com/material-rounded/48/ffffff/github.png" alt="LinkedIn Icon"
                    class="w-8 h-8 mx-2">
            </a>
            <a href="https://www.linkedin.com/in/sduttt/" target="_blank" rel="noopener noreferrer">
                <img src="https://img.icons8.com/material-rounded/48/ffffff/twitterx.png" alt="LinkedIn Icon"
                    class="w-8 h-8 mx-2">
            </a>
        </div>
    </div>
</div>




<?php
include_once "includes/footer.php";
?>