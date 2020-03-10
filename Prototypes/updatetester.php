<?php
$serverName = "localhost";
$username = "mooneruma_info";
$password = "dmacc2020";
$dbname = "mooneruma_info";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
	$first_name = "Namer";

	$sql =	"UPDATE student_info_2020 SET student_first_name = '$student_first_name', student_last_name = '$student_last_name', student_username = '$student_username',
			student_password = '$student_password', student_program = '$student_program', student_portfolio = '$student_portfolio', student_linkedin = '$student_linkedin', student_secondary = '$student_secondary',
			student_hometown = '$student_hometown', student_career_goals = '$student_career_goals', student_hobbies = '$student_hobbies', student_state = '$student_state' WHERE student_ID = '$student_ID'";
			

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>