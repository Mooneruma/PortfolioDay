<!doctype html>
<html>




	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- head does not display-->
		<title>TestProto</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	</head>
	
	<style>

	*{
		margin: auto;
		padding: 0;
	}

	header{
		background-color: black;
		color: white;
		padding-top: 0.5em;
		padding-bottom: 1em;
	}

	body{
		position: relative;
		background-image: url("Background.png");
		text-align: center;
		background-repeat: no-repeat;
		background-size:100% 100%;
	}

	#main{
		width: 90%;
		padding-top: 2em;
	}

	#wrapper{
		background-color: white;
		width: 75%;
		padding-bottom: 75%;
		margin-top: 15%;
	}

	#footer{
		background-color: white;
		color: black;
		margin: auto;
		width: 75%;
		padding: 0;
		float: right;
		padding-top: 2em;
	}
	.error	{
	color:red;
	font-style:italic;	
}
	#submit{
		visibility: hidden;
		
	}
	table{
		
		background-color: white;
	}

	</style>


	<body>
		<div id = "wrapper">


			<content id = "main">
	
	<?php
	
	include 'connectPDO.php';
	session_start();
	if($_SESSION["User"] == "admin"){
	//connects to the database

	$stmt = $conn->prepare("SELECT  student_ID, student_first_name, student_last_name,  student_username, student_password,  student_program, student_portfolio, student_linkedin, student_secondary, student_hometown, student_career_goals, student_hobbies, student_state FROM student_info_2020");
	$stmt->execute();
?>
<img src = "HeaderLogo.png" alt = "Dmacc Portfolio Day">
<h1>Admin Page</h1>
<h2>
<a href = "http://kmoonpage.com/Prototypes/Logout.php">Logout</a>
</h2>
<table border='1'>
	<tr>
		<td>ID</td>
		<td>First name</td>
		<td>Last name</td>
		<td>Username</td>
		<td>Password</td>
		<td>Program</td>
		<td>portfolio web address</td>
		<td>linkedin web address</td>
		<td>Secondary link address</td>
		<td>Hometown</td>
		<td>Career goals</td>
		<td>Hobbies</td>
		<td>State</td>
		<td>DELETE</td>
<?php 
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		echo "<tr>";
			// $name_pass = $_SESSION["NamePass"];
			// echo $name_pass;
			echo "<td>" . $row['student_ID'] . "</td>";
			echo "<td>" . $row['student_first_name'] . "</td>";	
			echo "<td>" . $row['student_last_name'] . "</td>";
			echo "<td>" . $row['student_username'] . "</td>";
			echo "<td>" . $row['student_password'] . "</td>";
			echo "<td>" . $row['student_program'] . "</td>";
			echo "<td>" . $row['student_portfolio'] . "</td>";
			echo "<td>" . $row['student_linkedin'] . "</td>";	
			echo "<td>" . $row['student_secondary'] . "</td>";
			echo "<td>" . $row['student_hometown'] . "</td>";
			echo "<td>" . $row['student_career_goals'] . "</td>";
			echo "<td>" . $row['student_hobbies'] . "</td>";
			echo "<td>" . $row['student_state'] . "</td>";
			// echo "<td><a href='StudentUpdateForm.php?student_ID=" . $row['student_ID'] . "'>Update</a></td>"; 
			echo "<td><a href='deleteEvent.php?student_ID=" . $row['student_ID'] . "'>Delete</a></td>"; 		
		echo "</tr>";
	}
	?> 
	</table>
	
	<h3>
		<a href = "http://kmoonpage.com/Prototypes/TestProto.php">Add to database</a>
	</h3>
	<?php
	}else{
		echo("you are not a valid user. Please return to login page");
		?> <a href = "http://kmoonpage.com/Prototypes/Login.php">Login Page</a> <?php
	}
		
?>
</table>
	
		</content>
<!--
		<content id = "sidebar">


			<a href = "kmoonpage.com">Home</a>

		</content> -->

	<content id ="footer">

	</content>
</div>
</body>

</html>
