<?php
include '../utils/dbconnect.php';
$error = false;

$successAlert = '<div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-4 py-3 " role="alert">
<p class="font-semibold text-sm">Account created successfully!</p>
<p class="text-xs">Please <a href="employee_login.php" class="underline text-blue-800">Login</a> to continue</p>
</div>';

$notFilledAlert = '<div class="bg-red-100 border-t border-b border-red-500 text-red-700 px-4 py-3 " role="alert">
<p class="font-semibold text-sm">All informations are not provided</p>
<p class="text-xs">Please fill all required informations to register.</p>
</div>';


$alreadyExistsAlert = '<div class="bg-red-100 border-t border-b border-red-500 text-red-700 px-4 py-3 " role="alert">
<p class="font-semibold text-sm">User already exists.</p>
<p class="text-xs">Please log in if already registered</p>
</div>';

$notRegisteredAlert = '<div class="bg-red-100 border-t border-b border-red-500 text-red-700 px-4 py-3 " role="alert">
<p class="font-semibold text-sm">User not registered.</p>
<p class="text-xs">Request your admin to add you as an employee or check your Email and Employee ID carefully.</p>
</div>';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employeeID = $_POST["employeeID"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $exists = false;
    $isAddedByAdmin = true;



    $check_query = "SELECT * FROM employee_auth WHERE email='$email' OR employeeID='$employeeID'";
    $check_result = mysqli_query($conn, $check_query);

    $checkAdmin_query = "SELECT * FROM employees WHERE email='$email' AND employeeID='$employeeID'";
    $checkAdmin_result = mysqli_query($conn, $checkAdmin_query);


    if (mysqli_num_rows($check_result) > 0) {
        $exists = true;
        echo $alreadyExistsAlert;
    }

    else if (mysqli_num_rows($checkAdmin_result) == 0) {
        $isAddedByAdmin = false;
        echo $notRegisteredAlert;
    }

    else if (empty($employeeID) || empty($email) || empty($password)) {
        $error = true;
        echo $notFilledAlert;
    }

    else if ($isAddedByAdmin && !$exists) {
        // Insert new employee data into the database
        $insert_query = "INSERT INTO employee_auth (employeeID, email, password) VALUES ('$employeeID', '$email', '$hash')";
        $insert_result = mysqli_query($conn, $insert_query);

        if ($insert_result) {
            echo $successAlert;
        } else {
            echo '<div class="bg-red-100 border-t border-b border-red-500 text-red-700 px-4 py-3 " role="alert">
                <p class="font-semibold text-sm">Error creating account.</p>
                <p class="text-xs">Please try again later.</p>
                </div>';
        }
    }



}

?>


<?php
$pageTitle = "Employee Sign Up";
include_once "../includes/header.php";

?>

<section class="rounded-md bg-black/70 p-2">
    <div class="flex items-center justify-center bg-white px-4 py-10 sm:px-6 sm:py-16 lg:px-8">
        <div class="xl:mx-auto xl:w-full xl:max-w-sm 2xl:max-w-md">
            <div class="mb-2">
                <svg width="50" height="56" viewBox="0 0 50 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M23.2732 0.2528C20.8078 1.18964 2.12023 12.2346 1.08477 13.3686C0 14.552 0 14.7493 0 27.7665C0 39.6496 0.0986153 41.1289 0.83823 42.0164C2.12023 43.5449 23.2239 55.4774 24.6538 55.5267C25.9358 55.576 46.1027 44.3832 48.2229 42.4602C49.3077 41.474 49.3077 41.3261 49.3077 27.8158C49.3077 14.3055 49.3077 14.1576 48.2229 13.1714C46.6451 11.7415 27.1192 0.450027 25.64 0.104874C24.9497 -0.0923538 23.9142 0.00625992 23.2732 0.2528ZM20.2161 21.8989C20.2161 22.4906 18.9835 23.8219 17.0111 25.3997C15.2361 26.7803 13.8061 27.9637 13.8061 28.0623C13.8061 28.1116 15.2361 29.0978 16.9618 30.2319C18.6876 31.3659 20.2655 32.6479 20.4134 33.0917C20.8078 34.0286 19.871 35.2119 18.8355 35.2119C17.8001 35.2119 9.0233 29.3936 8.67815 28.5061C8.333 27.6186 9.36846 26.5338 14.3485 22.885C17.6521 20.4196 18.4904 20.0252 19.2793 20.4196C19.7724 20.7155 20.2161 21.3565 20.2161 21.8989ZM25.6893 27.6679C23.4211 34.9161 23.0267 35.7543 22.1391 34.8668C21.7447 34.4723 22.1391 32.6479 23.6677 27.9637C26.2317 20.321 26.5275 19.6307 27.2671 20.3703C27.6123 20.7155 27.1685 22.7864 25.6893 27.6679ZM36.0932 23.2302C40.6788 26.2379 41.3198 27.0269 40.3337 28.1609C39.1503 29.5909 31.6555 35.2119 30.9159 35.2119C29.9298 35.2119 28.9436 33.8806 29.2394 33.0424C29.3874 32.6479 30.9652 31.218 32.7403 29.8867L35.9946 27.4706L32.5431 25.1532C30.6201 23.9205 29.0915 22.7371 29.0915 22.5892C29.0915 21.7509 30.2256 20.4196 30.9159 20.4196C31.3597 20.4196 33.6771 21.7016 36.0932 23.2302Z"
                        fill="black"></path>
                </svg>
            </div>
            <h2 class="text-2xl font-bold leading-tight text-black">
                Employee Sign up
            </h2>
            <p class="mt-2text-sm text-gray-600 ">
                Are you an Admin?
                <a href="./admin_signup.php" title=""
                    class="font-semibold text-black transition-all duration-200 hover:underline">
                    Sign up here
                </a>
            </p>
            <form action="#" method="post" class="mt-8">
                <div class="space-y-5">
                    <div>
                        <label for="" class="text-base font-medium text-gray-900">

                            Employee ID
                        </label>
                        <div class="mt-2">
                            <input
                                class="flex h-10 w-full rounded-md border border-gray-300 bg-transparent px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50"
                                required name='employeeID' type="text" placeholder="Employee ID" />
                        </div>
                    </div>
                    <div>
                        <label for="" class="text-base font-medium text-gray-900">

                            Email address
                        </label>
                        <div class="mt-2">
                            <input
                                class="flex h-10 w-full rounded-md border border-gray-300 bg-transparent px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50"
                                required name='email' type="email" placeholder="Email" />
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center justify-between">
                            <label for="" class="text-base font-medium text-gray-900">

                                Password
                            </label>

                        </div>
                        <div class="mt-2">
                            <input
                                class="flex h-10 w-full rounded-md border border-gray-300 bg-transparent px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50"
                                required name="password" type="password" placeholder="Password" />
                        </div>
                    </div>
                    <div>
                        <button type="submit"
                            class="inline-flex w-full items-center justify-center rounded-md bg-black px-3.5 py-2.5 font-semibold leading-7 text-white hover:bg-black/80">
                            Sign Up
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="ml-2">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </button>
                        <p class="mt-2text-sm text-gray-600 ">
                            Already have an account?
                            <a href="./employee_login.php" title=""
                                class="my-3 font-semibold text-black transition-all duration-200 hover:underline">
                                Log In here
                            </a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
</section>
<?php
include_once "../includes/footer.php";
?>