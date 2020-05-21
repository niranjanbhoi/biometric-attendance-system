<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "creative_tm";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sha_hash = $_POST['sha_hash'];
$device_ip = $_POST['device_ip'];

// the deafult value
$ct_io_status = 0;
$L_E_entey = 0;

$ct_io_status = $_POST['ct_io_status'];
$L_E_entey = $_POST['L_E_entey'];

$sql = "SELECT id, firstname FROM ct_register WHERE sha_hash = '$sha_hash'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        // echo "id: " . $row["id"];
        $user_id = $row["id"];
        $user_name = $row["firstname"];
        date_default_timezone_set('Asia/Kolkata');
        $date =  date('Y-m-d');
        $time = date('H:i:s');

        $sql = "SELECT ct_io_status FROM ct_user_entry WHERE user_id = '$user_id' AND date = '$date'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $status = $row["ct_io_status"];
                echo $status;
                if ($status != null) {
                    // echo "Enter a l_e_entry";
                    $sql = "UPDATE ct_user_entry SET L_E_entey= '$L_E_entey' , out_time = '$time' WHERE user_id = '$user_id' AND date = '$date'";

                    if ($conn->query($sql) === TRUE) {
                        echo "Record updated successfully";
                    } else {
                        echo "Error updating record: "; //. $conn->error;
                    }
                }
            }
        } else {
            // echo "Enter a row ct_io_status";
            $sql = "INSERT INTO ct_user_entry (name, user_id, device_ip, time, ct_io_status)
                VALUES ('$user_name', $user_id, '$device_ip', '$time', '$ct_io_status')";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: "; //. $sql . "<br>" . $conn->error;
            }
        }


        // $sql = "INSERT INTO ct_user_entry (name, user_id, device_ip,date, time, ct_io_status, L_E_entey)
        //     VALUES ('$user_name', $user_id, '$device_ip', '$date', '$time', '$ct_io_status', '$L_E_entey')";
        // if ($conn->query($sql) === TRUE) {
        //     echo "New record created successfully";
        // } else {
        //     echo "Error: " . $sql . "<br>" . $conn->error;
        // }
    }
} else {
    echo "not match sha_key";
}
$conn->close();
