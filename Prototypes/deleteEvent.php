<?php
$serverName = "localhost";
$username = "mooneruma_info";
$password = "dmacc2020";
$dbname = "mooneruma_info";
session_start();


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

	$deleteEventId = $_GET['student_ID'];

	$sql = "DELETE FROM student_info_2020 WHERE student_ID = '$deleteEventId'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>