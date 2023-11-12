<?php
// $server = "localhost";
// $username = "root";
// $password = "";
// $database = "LeaveManager";

$server = "leavemanager.mysql.database.azure.com";
$username = "subham";
$password = "Sdutta@7866";
$database = "leavemanager";

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    die("Connection error". mysqli_connect_error());
};
