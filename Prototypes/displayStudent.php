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
		padding-bottom: 55%;
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
	if($_SESSION["User"] == "valid"){
	//connects to the database
	$name_pass = $_SESSION["NamePass"];
	$stmt = $conn->prepare("SELECT  student_ID, student_first_name, student_last_name,  student_username, student_password,  student_program, student_portfolio, student_linkedin, student_secondary, student_hometown, student_career_goals, student_hobbies, student_state FROM student_info_2020 WHERE student_username = '$name_pass'");
	$stmt->execute();
?>
<img src = "HeaderLogo.png" alt = "Dmacc Portfolio Day"><br>
<h1>Profile Information</h1>
<h2>
<a href = "http://kmoonpage.com/Prototypes/Logout.php">Logout</a>
</h2>
<br><br>
<?php 
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
			//echo "" . $row['student_ID'] . "";
			echo "<u>First Name</u><br><br>" . $row['student_first_name'] . "<br><br><br>";	
			echo "<u>Last Name</u><br><br>" . $row['student_last_name'] . "<br><br><br>";
			echo "<u>Username</u><br><br>" . $row['student_username'] . "<br><br><br>";
			echo "<u>Password</u><br><br>" . $row['student_password'] . "<br><br><br>";
			echo "<u>Program</u><br><br>" . $row['student_program'] . "<br><br><br>";
			echo "<u>Portfolio Page</u><br><br>" . $row['student_portfolio'] . "<br><br><br>";
			echo "<u>LinkedIn Page</u><br><br>" . $row['student_linkedin'] . "<br><br><br>";	
			echo "<u>Secondary Page</u><br><br>" . $row['student_secondary'] . "<br><br><br>";
			echo "<u>Hometown</u><br><br>" . $row['student_hometown'] . "<br><br><br>";
			echo "<u>Goals</u><br><br>" . $row['student_career_goals'] . "<br><br><br>";
			echo "<u>Hobbies</u><br><br>" . $row['student_hobbies'] . "<br><br><br>";
			echo "<u>State</u><br><br>" . $row['student_state'] . "<br><br><br>";
			echo "<u>Update your information form: </u><td><a href='StudentUpdateForm.php?student_ID=" . $row['student_ID'] . "'>Update</a></td><br>"; 
			echo "<u>Delete your information:  </u> <a href='deleteEvent.php?student_ID=" . $row['student_ID'] . "'>Delete</a> <br>"; 		

	}
	?> 

	
	<h3>
		
	</h3>
	<?php
	}else{
		echo("you are not a valid user. Please return to login page");
		?> <a href = "http://kmoonpage.com/Prototypes/StudentLogin.php">Login Page</a> <?php
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
