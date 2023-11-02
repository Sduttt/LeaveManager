<?php
include '../utils/dbconnect.php';

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: ../auth/employee_login.php");
    exit;
}

function conditionalClass($pageName)
{
    $pages = explode('/', $_SERVER['PHP_SELF']);

    $curPage = $pages[3];
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


<!-- <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
    type="button"
    class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
        </path>
    </svg>
</button> -->

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
                <a href="leave_status.php"
                    class="<?php conditionalClass("leave_status.php") ?> flex items-center p-2 text-gray-900 rounded-lg dark:text-white group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 0C4.486 0 0 4.486 0 10s4.486 10 10 10 10-4.486 10-10S15.514 0 10 0zm0 18.75c-4.694 0-8.5-3.806-8.5-8.5S5.306 1.75 10 1.75s8.5 3.806 8.5 8.5-3.806 8.5-8.5 8.5zm0-15.625c-3.308 0-6 2.692-6 6v1.25h12v-1.25c0-3.308-2.692-6-6-6zm0 2.5c1.517 0 2.75 1.233 2.75 2.75S11.517 10 10 10s-2.75-1.233-2.75-2.75S8.483 5.625 10 5.625z"/>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Leave Status</span>
                </a>
            </li>
            <li>
                <a href="apply_leave.php"
                    class="<?php conditionalClass("apply_leave.php") ?> flex items-center p-2 text-gray-900 rounded-lg dark:text-white group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 0C4.486 0 0 4.486 0 10s4.486 10 10 10 10-4.486 10-10S15.514 0 10 0zm-1.25 16.25a1.25 1.25 0 1 1 2.5 0v1.25a1.25 1.25 0 0 1-2.5 0v-1.25zm-3.75-3.75a1.25 1.25 0 1 1 1.768-1.768l.982.982a1.25 1.25 0 0 1-1.768 1.768l-.982-.982zm7.5 0a1.25 1.25 0 1 1-1.768 1.768l-.982-.982a1.25 1.25 0 0 1 1.768-1.768l.982.982zm-5-7.5a1.25 1.25 0 1 1 0 2.5h-1.25a1.25 1.25 0 0 1 0-2.5h1.25zm3.75-3.75a1.25 1.25 0 1 1-1.768 1.768l-.982-.982a1.25 1.25 0 0 1 1.768-1.768l.982.982zm-3.75 0a1.25 1.25 0 1 1 0-2.5h1.25a1.25 1.25 0 0 1 0 2.5h-1.25z" />
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Apply Leave</span>
                </a>
            </li>
            <li>
                <a href="leave_account.php"
                    class="<?php conditionalClass("leave_account.php") ?> flex items-center p-2 text-gray-900 rounded-lg dark:text-white group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M16.6667 1.66667H3.33333C2.6 1.66667 2 2.26667 2 3V16.3333C2 17.0667 2.6 17.6667 3.33333 17.6667H16.6667C17.4 17.6667 18 17.0667 18 16.3333V3C18 2.26667 17.4 1.66667 16.6667 1.66667ZM3.33333 3.33333H16.6667V6.66667H3.33333V3.33333ZM3.33333 8.33333H16.6667V11.6667H3.33333V8.33333ZM3.33333 12.3333H16.6667V15.6667H3.33333V12.3333Z"/>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Leave Account</span>
                </a>
            </li>
            <li>
                <a href="leave_history.php"
                    class="<?php conditionalClass("leave_history.php") ?> flex items-center p-2 text-gray-900 rounded-lg dark:text-white group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M16.5 2h-13a1.5 1.5 0 0 0-1.5 1.5v15a1.5 1.5 0 0 0 1.5 1.5h13a1.5 1.5 0 0 0 1.5-1.5v-15a1.5 1.5 0 0 0-1.5-1.5zm-11 3h7v1h-7zm0 3h7v1h-7zm0 3h7v1h-7zm0 3h7v1h-7z" />
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Leave istory</span>
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
        </ul>
    </div>
</aside>


<?php
$employeeID = $_SESSION['employeeID'];

$empQry = "SELECT * FROM `employees` WHERE `employeeID` = '$employeeID'";
$empQryResult = mysqli_query($conn, $empQry);

$row = mysqli_fetch_assoc($empQryResult);
$emp_name = $row['name'];
$emp_id = $row['employeeID'];
$emp_email = $row['email'];
$emp_designation = $row['designation'];
$emp_admin = $row['adminID'];

?>
<div class=" bg-blue-100 p-4 text-black font-bold text-xl ml-64 flex justify-between">
    <h2 class="">Welcome to Employee Dashboard</h2>
    <h5 class="">Logged in as: <span class="font-medium text-md">
            <?php echo $emp_name ?>
        </span></h5>
</div>