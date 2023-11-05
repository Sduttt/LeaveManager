<?php
include_once "./index.php";
?>
<!-- Fetching data -->

<?php

$idQuery = "SELECT `id` FROM `admins` WHERE `email` = '$user'";
$joiningDateQuery = "SELECT `time` FROM `admins` WHERE `email` = '$user'";

$idResult = mysqli_query($conn, $idQuery);
$joiningDateResult = mysqli_query($conn, $joiningDateQuery);

$id = mysqli_fetch_assoc($idResult);
$joiningDate = mysqli_fetch_assoc($joiningDateResult);

$id = $id['id'];
$joiningDate = $joiningDate['time'];
?>

<div class="mx-auto max-w-7xl mt-8 px-4 sm:px-6 lg:px-8 ml-72">
    <h1 class="text-4xl font-bold mb-4">Profile:</h1>
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                <div class="sm:col-span-1">
                    <dt class="text-lg font-medium text-gray-500">Admin Id:</dt>
                    <dd class="mt-1 text-lg text-gray-900"><?php echo $id ?></dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-lg font-medium text-gray-500">Email Id:</dt>
                    <dd class="mt-1 text-lg text-gray-900"><?php echo $user ?></dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-lg font-medium text-gray-500">Name:</dt>
                    <dd class="mt-1 text-lg text-gray-900"><?php echo $uName ?></dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-lg font-medium text-gray-500">Joining Date:</dt>
                    <dd class="mt-1 text-lg text-gray-900"><?php echo date('d-m-Y', strtotime($joiningDate)) ?></dd>
                </div>
            </dl>
        </div>
    </div>
</div>


<?php
include_once "../includes/footer.php";
?>