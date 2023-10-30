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

<div class="ml-72 mt-8">

    <h1 class='font-bold text-xl'>Profile:</h1>

    <div class="">
        Admin Id: <?php echo $id ?>;<br>
        Email Id: <?php echo $user ?>; <br>
        Name: <?php echo $uName ?>; <br>
        Joining Date: <?php echo $joiningDate ?>;
    </div>

</div>


<?php
include_once "../includes/footer.php";
?>