<?php
require_once 'connection/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $first_Name = $_POST['firstName'];
    $middle_Name = $_POST['middleName'];
    $last_Name = $_POST['lastName'];
    $region = $_POST['region'];
    $contactAddress = $_POST['contactAddress'];
    $services_name = $_POST['services_name'];

    $sql = "UPDATE person SET firstName = ?, middleName = ?, lastName = ?, region = ?, contactAddress = ?, services_name = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $first_Name, $middle_Name, $last_Name, $region, $contactAddress, $services_name, $id);

    if ($stmt->execute()) {
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request.";
}


?>