<?php
$dbHost = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "exam";

$conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} ?>