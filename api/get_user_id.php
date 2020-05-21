<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "creative_tm";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$device_ip = $_POST['device_ip'];
$sql = "SELECT id FROM ct_register WHERE device_ip = '$device_ip'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo $row["id"];
    }
} else {
}
$conn->close();
