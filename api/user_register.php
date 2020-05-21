<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "creative_tm";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id = $_POST['id'];
$sha_hash = $_POST['sha_hash'];
$sql = "UPDATE ct_register SET sha_hash='$sha_hash' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully \n";
    $sql = "UPDATE ct_register SET device_ip='' WHERE sha_hash='$sha_hash'";
    if ($conn->query($sql) === TRUE) {
        // echo "del device_ip updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "Already data found";
}

$conn->close();
