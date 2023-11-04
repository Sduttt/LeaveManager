<?php
session_start();
include_once "./index.php";
include_once "../includes/header.php";

$alreadyExistsAlert = '<div class="text-md font-semibold w-80  mt-2 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
Employee already exists!</div>';

$notFilledAlert = '<div class="text-md font-semibold w-80  mt-2 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
Please fill all the fields!</div>';

$successAlert = '<div class="text-md font-semibold w-80  mt-2 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
Employee <span class="font-medium italic text-blue-900 underline">' . $employeeID . '</span> added successfully!</div>';


$alert = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $adminID = $_SESSION['id'];
    $employeeID = $_POST['employee_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $designation = $_POST['designation'];
    $totalLeave = $_POST['leave_per_annum'];



    $sql = "INSERT INTO employees (adminID, employeeID, name, email, designation, totalLeave) VALUES ('$adminID', '$employeeID', '$name', '$email', '$designation', '$totalLeave')";
    $sql2 = "INSERT INTO `leave_account` (`employeeID`, `total_leaves`, `used_leaves`, `pending_leaves`, `remaining_leaves`) VALUES ('$employeeID', '$totalLeave', '0', '0', '$totalLeave')";

    $isExistSql = "SELECT * FROM employees WHERE employeeID='$employeeID' OR email='$email'";

    $isExistResult = mysqli_query($conn, $isExistSql);

    if(mysqli_num_rows($isExistResult) == 0) {
        if(empty($employeeID) || empty($name) || empty($email) || empty($designation) || empty($totalLeave)){
            $alert = $notFilledAlert;
        }
        else{
            $result = mysqli_query($conn, $sql);
            $result2 = mysqli_query($conn, $sql2);
            if($result && $result2){
                // header("location: ./dashboard.php");
                $alert = $successAlert;
            }
            else{
                echo "<div class='flex justify-center items-center h-screen'><h1 class='text-green-500 text-3xl'>Error: " . $sql . "<br>" . $conn->error . "</h1></div>";
            }
        }
    }
    else{
        $alert = $alreadyExistsAlert;
    }
    
}

$pageTitle = "Add Employee";
include_once "../includes/header.php";
?>

<div class="flex ml-64 p-6 justify-around">
    <div class=" w-1/3 my-auto">
        <h1 class="text-3xl font-semibold">Add New Employee:</h1>
        <br>
        <?php
        echo $alert;
        ?>
    </div>
    <form action="" method="post" class="w-1/2  mt-8 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                Name
            </label>
            <input required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="name" type="text" placeholder="Enter name" name="name">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                Email
            </label>
            <input required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="email" type="email" placeholder="Enter email" name="email">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="employee_id">
                Employee ID
            </label>
            <input required  maxlength="5"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="employee_id" type="text" placeholder="Enter employee ID" name="employee_id">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="designation">
                Designation
            </label>
            <input required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="designation" type="text" placeholder="Enter designation" name="designation">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="leave_per_annum">
                Leave per annum
            </label>
            <input required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="leave_per_annum" type="number" placeholder="Enter leave per annum" name="leave_per_annum">
        </div>
        <div class="flex items-center justify-between">
            <button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">
                Add Employee
            </button>
        </div>

    </form>

</div>

<?php
include_once "../includes/footer.php";
?>