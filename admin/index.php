<?php
include '../utils/dbconnect.php';

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: ../auth/admin_login.php");
    exit;
}

function conditionalClass($pageName)
{
    $pages = explode('/', $_SERVER['PHP_SELF']);

    $curPage = end($pages);
    if ($pageName == $curPage) {
        echo "bg-blue-200";
    } else {
        echo "hover:bg-gray-100";
    }
}

?>

<?php
$pageTitle = "Admin Dashboard";
include_once "../includes/header.php";
?>

<aside id="default-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li class='border-b '>
                <a href="#"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 group">
                    <svg class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path
                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path
                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ml-3 font-bold text-xl">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="profile.php"
                    class="<?php conditionalClass("profile.php") ?> flex items-center p-2 text-gray-900 rounded-lg dark:text-white group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path
                            d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Profile</span>
                </a>
            </li>
            <li>
                <a href="employees.php"
                    class="<?php conditionalClass("employees.php") ?> flex items-center p-2 text-gray-900 rounded-lg dark:text-white group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path
                            d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Employees</span>
                </a>
            </li>
            <li>
                <a href="add_employee.php"
                    class="<?php conditionalClass("add_employee.php") ?> flex items-center p-2 text-gray-900 rounded-lg dark:text-white group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                        <path
                            d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Add Employee</span>
                </a>
            </li>
            <li>
                <a href="leave_applications.php"
                    class="<?php conditionalClass("leave_applications.php") ?> flex items-center p-2 text-gray-900 rounded-lg dark:text-white group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Leave Applications</span>
                    <span
                        class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">
                        <?php
                        $adminID = $_SESSION['id'];
                        $leaveQry = "SELECT COUNT(*) AS `count` FROM `leave_details` WHERE `isApproved` = false AND `isRejected` = false AND `adminID` = '$adminID'";
                        $leaveQryResult = mysqli_query($conn, $leaveQry);
                        while ($row = mysqli_fetch_assoc($leaveQryResult)) {
                            echo $row['count'];
                        }
                        ?>
                    </span>
                </a>
            </li>
            <li>
                <a href="../auth/logout.php"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Log Out</span>
                </a>
            </li>

            <li class="border-t fixed bottom-4 w-[calc(100%-16rem)] pt-4 px-2 ">
                <h1 class="font-semibold text-gray-500 text-center my-1 text-xl">Developed by:</h1>
                <div class="flex items-end">
                    <img src="../images/dp.png" alt="Developer Avatar" class="w-12 h-12 rounded-full mr-2">
                    <div class="flex flex-col items-center mt-4">
                        <span class="text-gray-900 font-semibold text-lg">Subham Dutta</span>

                        <div class="flex items-center">
                            <a href="https://www.linkedin.com/in/sduttt/" target="_blank" rel="noopener noreferrer">
                                <img src="https://img.icons8.com/material-outlined/48/000000/linkedin.png"
                                    alt="LinkedIn Icon" class="w-5 h-5 mr-2">
                            </a>
                            <a href="https://github.com/sduttt" target="_blank" rel="noopener noreferrer">
                                <img src="https://img.icons8.com/material-outlined/48/000000/github.png"
                                    alt="GitHub Icon" class="w-5 h-5 mr-2">
                            </a>
                            <a href="https://sduttt.netlify.app/" target="_blank" rel="noopener noreferrer">
                                <img src="https://img.icons8.com/material-outlined/48/000000/domain.png"
                                    alt="Website Icon" class="w-5 h-5">
                            </a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</aside>


<?php
$user = $_SESSION['email'];

$nameQry = "SELECT `name` FROM `admins` WHERE `email` = '$user'";
$nameQryResult = mysqli_query($conn, $nameQry);

$row = mysqli_fetch_assoc($nameQryResult);
$uName = $row['name'];

?>
<div class="sticky top-0 w-[calc(100%-16rem)] bg-blue-100 p-4 text-black font-bold text-xl ml-64 flex justify-between">
    <h2 class="">Welcome to Admin Dashboard</h2>
    <h5 class="">Logged in as: <span class="font-medium text-md">
            <?php echo $uName ?>
        </span></h5>
</div>