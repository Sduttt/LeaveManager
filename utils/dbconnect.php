<?php
// $server = "localhost";
// $username = "root";
// $password = "";
// $database = "LeaveManager";

$server = "leavemanager.mysql.database.azure.com";
$username = "subham";
$password = "Sdutta@7866";
$database = "leavemanager";

$db = mysqli_init();
mysqli_ssl_set($db, NULL, NULL, "path/to/BaltimoreCyberTrustRoot.crt.pem", NULL, NULL); // Replace "path/to/BaltimoreCyberTrustRoot.crt.pem" with your SSL certificate path

$conn = mysqli_real_connect($db, $server, $username, $password, $database, 3306); // 3306 is the default MySQL port, change if needed

if (!$conn) {
    die("Connection error: " . mysqli_connect_error());
}