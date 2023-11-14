<?php
// $server = "localhost";
// $username = "root";
// $password = "";
// $database = "LeaveManager";

$server = "leavemanager.mysql.database.azure.com";
$username = "subham";
$password = "Sdutta@7866";
$database = "leavemanager";

$conn = mysqli_init();
mysqli_ssl_set($conn, NULL, NULL, "../BaltimoreCyberTrustRoot.crt.pem", NULL, NULL);

$connectionSuccessful = mysqli_real_connect($conn, $server, $username, $password, $database, 3306); // 3306 is the default MySQL port, change if needed

if (!$connectionSuccessful) {
    die("Connection error: " . mysqli_connect_error());
}

