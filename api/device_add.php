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
$device_name = $_POST['device_name'];
$device_ip = $_POST['device_ip'];
$device_mac = $_POST['device_mac'];

$sql = "SELECT device_ip FROM ct_device_info WHERE device_ip = '$device_ip'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $device_all = mysqli_query($conn, "select * from ct_device_info where device_name='$device_name' AND device_ip='$device_ip' AND device_mac='$device_mac'");
    if (mysqli_num_rows($device_all) > 0) {
        echo "Already this Device";
        //already data inserted 
    } else {
        $sql = "UPDATE ct_device_info SET device_name = '$device_name', device_mac = '$device_mac' WHERE device_ip = '$device_ip'";
        if ($conn->query($sql) === TRUE) {
            echo "sucessfully added";
        } else {
            echo "something wan't problem!!! check them :)";
        }
    }

    // output data of each row
    // while ($row = $result->fetch_assoc()) {
    //     echo $row["device_ip"];
    // }
} else {
    echo "Add this ip into admin panel";
}


$conn->close();
