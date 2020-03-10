<!doctype html>
<html>




	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- head does not display-->
		<title>TestProto</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<?php
session_start();
$inName = "";
$inDesc = "";
$_SESSION["User"] = "";

		if(isset($_POST["submit"]))
	{	

		$inName = $_POST['inName'];
		$inDesc = $_POST['inDesc'];
		
		if($inName == "Admin" && $inDesc == "portfolioDay2020"){
			$_SESSION["User"] = "admin";
			header('Location: displayStudents.php'); 
		}else{
			$_SESSION["User"] = "Invalid";
		}
		
	}

?>

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

	table{
		
		background-color: white;
	}

	</style>


	<body>
		<div id = "wrapper">
			
<img src = "HeaderLogo.png" alt = "Dmacc Portfolio Day">
			<content id = "main">
	
	<div id="orderArea">
<form id="form1" name="form1" method="post" action=" <?php echo htmlentities($_SERVER['PHP_SELF']); ?> ">
  <h3>Login: <span class = "error"><?php if($_SESSION["User"] == "Invalid"){echo "login information incorrect.";}?></span></h3>

    <tr>
      <td>Enter User Name:<br> </td>
      <td><input type="text" name="inName" id="inName" size="50" value = "<?php echo htmlspecialchars($inName); ?>" /><br></td>
    </tr>
	
    <tr>
      <td>Enter Password:<br> </td>
      <td><input type="text" name="inDesc" id="inDesc" size="50" value = "<?php echo htmlspecialchars($inDesc); ?>" /><br></td>
    </tr>	
    <input type="submit" name="submit" id="submit" value="Login" />
    <input type="reset" name="button2" id="button2" value="Clear Form" />
</form>


</div>


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
