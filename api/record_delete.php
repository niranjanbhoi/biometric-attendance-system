<?php

// its remove into file respi code

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
// sql to delete a record
$sql = "DELETE FROM add_fingerprint WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>