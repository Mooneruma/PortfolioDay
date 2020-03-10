<?php 

	define('SITE_KEY', '6Le2FeAUAAAAALx8PveWphJSMKSIbVkVE67oBvkK');
	define('SECRET_KEY', '6Le2FeAUAAAAAFKWApt4hQTOTgL_mmivOiolUua0');

			function getCaptcha($SecretKey){
			 $Response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".SECRET_KEY."&response={$SecretKey}");
			 $Return = json_decode($Response);
				return $Return;
		}

?>

<!doctype html>
<html>




	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- head does not display-->
		<title>TestProto</title>

	<script src="https://www.google.com/recaptcha/api.js?render=<?php echo SITE_KEY;?>"></script>
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

	</style>


<?php 


	session_start();
	
	$student_first_name = "";
	$student_last_name = "";
	$student_program = "";
	$student_portfolio = "";
	$student_linkedin = "";
	$student_secondary = "";
	$student_hometown = "";
	$student_career_goals = "";
	$student_hobbies = "";
	$student_state = "";
	$student_minor = "";
	$student_password = "";
	$student_username = "";
	$student_password_re_enter = "";
	
	$student_first_name_error = "";
	$student_last_name_error = "";
	$student_program_error = "";
	$student_portfolio_error = "";
	$student_linkedin_error = "";
	$student_secondary_error = "";
	$student_hometown_error = "";
	$student_career_goals_error = "";
	$student_hobbies_error = "";
	$student_state_error = "";
	$student_minor_error = "";
	$student_password_error = "";
	$student_username_error = "";
	$student_password_re_enter_error = "";
	
	$form_complete = false;
	$valid = false;
	$clicked = false;
	
	// $student_ID = $_GET['student_ID'];
	$name_pass = $_SESSION["NamePass"];
	
	
	if(isset($_POST["button2"])){
		$student_first_name = "";
		$student_last_name = "";
		$student_program = "";
		$student_portfolio = "";
		$student_linkedin = "";
		$student_secondary = "";
		$student_hometown = "";
		$student_career_goals = "";
		$student_hobbies = "";
		$student_state = "";
		$student_minor = "";
		$student_password = "";
		$student_username = "";
		$student_password_re_enter = "";
		
		$student_first_name_error = "";
		$student_last_name_error = "";
		$student_program_error = "";
		$student_portfolio_error = "";
		$student_linkedin_error = "";
		$student_secondary_error = "";
		$student_hometown_error = "";
		$student_career_goals_error = "";
		$student_hobbies_error = "";
		$student_state_error = "";
		$student_minor_error = "";
		$student_password_error = "";
		$student_username_error = "";
		$student_password_re_enter_error = "";
		
		
	}
	
	if(isset($_POST["submit"])){
		
		$student_first_name = $_POST['student_first_name'];
		$student_last_name = $_POST['student_last_name'];
		$student_program = $_POST['student_program'];
		$student_portfolio = $_POST['student_portfolio'];
		$student_linkedin = $_POST['student_linkedin'];
		$student_secondary = $_POST['student_secondary'];
		$student_hometown = $_POST['student_hometown'];
		$student_career_goals = $_POST['student_career_goals'];
		$student_hobbies = $_POST['student_hobbies'];
		$student_state = $_POST['student_state'];
		$student_minor = $_POST['student_minor'];
		$student_password = $_POST['student_password'];
		$student_username = $_POST['student_username'];
		$student_password_re_enter = $_POST['student_password_re_enter'];
		$valid = true;
		
		$Return = getCaptcha($_POST['g-recaptcha-response']);
		//var_dump($Return);
		if($Return->success == true && $Return->score > 0.5){
		}else{
			$valid = false;		}
		
		
		if(preg_match('/^[a-zA-Z0-9,.!? ]*$/', $student_first_name)){
			if($student_first_name != ""){
				$student_first_name_error = "";
			}	
			else{
			
				$valid = false;
				$student_first_name_error = "Please enter your first name.";
			}}	
				else{
					$valid = false;
					$student_first_name_error = "No numbers or special characters allowed.";
				}
		
		
		if(preg_match('/^[a-zA-Z0-9,.!? ]*$/', $student_first_name)){
			if($student_first_name != ""){
				$student_first_name_error = "";
			}	
			else{
			
				$valid = false;
				$student_first_name_error = "Please enter your first name.";
			}}	
				else{
					$valid = false;
					$student_first_name_error = "No numbers or special characters allowed.";
				}
		
		if(preg_match('/^[a-zA-Z0-9,.!? ]*$/', $student_last_name)){
			
			if($student_last_name != ""){
				$student_last_name_error = "";
			}	
			else{
			
				$valid = false;
				$student_last_name_error = "Please enter your last name.";
			}}			
			else{
			
				$valid = false;
				$student_last_name_error = "No numbers or special characters allowed.";
			}
		
	
		if($student_program == 'default'){
				
				$valid = false;
				$student_program_error = "Please select an option.";
			}else{
				
				$student_program_error = "";
			}
		
		
		if(preg_match('/(\W|^)[\w.+\-]*@dmacc\.edu(\W|$)/', $student_username )){
				$student_username_error = "";
		}else{
				$valid = false;
				$student_username_error = "Please enter a valid email.";
			}
		
		
		if(!filter_var($student_portfolio, FILTER_VALIDATE_URL)){
				
				$valid = false;
				$student_portfolio_error = "Please enter a valid Web Link";
			}else{
				
				$student_portfolio_error = "";
			}
				
		if (!filter_var($student_linkedin, FILTER_VALIDATE_URL)){
				
				$valid = false;
				$student_linkedin_error = "Please enter a valid Web Link";
			}else{
				
				$student_linkedin_error = "";
			}
			
		if (!filter_var($student_secondary, FILTER_VALIDATE_URL)){
				
				$valid = false;
				$student_secondary_error = "Please enter a valid Web Link";
			}else{
				
				$student_secondary_error = "";
			}	
		
		if ($student_hometown == ""){
				
				$valid = false;
				$student_hometown_error = "Please enter a town";
			}else{
				
				$student_hometown_error = "";
			}
		/*
		if($student_goals == ""){
				$valid = false;
				$student_career_goals_error = "Please enter something small";
			}
		
		if($student_hobbies == ""){
				$valid = false;
				$student_hobbies_error = "Please enter something small";
			}
		*/
		if($student_state == "none"){
				$valid = false;
				$student_state_error = "Please enter something small";
			}else{
				
				$student_state_error = "";
			}
			
		if(ctype_space($student_password)){
				$valid = false;
				$student_password_error = " Please don't use any spaces.";
			}else{
				
				$student_password_error = "";
			}
			
		if($student_password_re_enter != $student_password){
			$valid = false;
			$student_password_re_enter_error = " Passwords do not match.";
		}else{
			
			$student_password_re_enter_error = "";
		}
		
		if($student_password_re_enter == ""){
			$valid = false;
			$student_password_re_enter_error = " Please enter something.";
		}
		
		if($student_password == ""){
				$valid = false;
				$student_password_error = "Please enter something.";
		}
		
		if($valid == true){
			
			$form_complete = true;
				
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

				// $student_ID = $_GET['student_ID'];
				
				$sql =  "UPDATE student_info_2020 SET student_first_name = '$student_first_name', student_last_name = '$student_last_name', student_username = '$student_username',student_password = '$student_password',
				student_program = '$student_program', student_portfolio = '$student_portfolio', student_linkedin = '$student_linkedin', student_secondary = '$student_secondary', student_hometown = '$student_hometown',
				student_career_goals = '$student_career_goals', student_hobbies = '$student_hobbies', student_state = '$student_state' WHERE student_username = '$name_pass'";

			if ($conn->query($sql) === TRUE) {
				echo "Record updated successfully";
				//echo $student_ID;
			} else {
				echo "Error updating record: " . $conn->error;
			}

		$conn->close();
			
			
		}	
	}	
		
?>
		
		<script>
		
			function Verify(){

					var valid = true;
					
					var student_first_name = $("#student_first_name").val();
					var student_last_name = $("#student_last_name").val();
					var student_program = $("#student_program").val();
					var student_username = $("#student_username").val();
					var student_portfolio = $("#student_portfolio").val();
					var student_linkedin = $("#student_linkedin").val();
					var student_secondary = $("#student_secondary").val();
					var student_hometown = $("#student_hometown").val();
					var student_career_goals = $("#student_career_goals").val();
					var student_hobbies = $("#student_hobbies").val();
					var student_state = $("#student_state").val();
					var student_password = $("#student_password").val();
					var student_password_re_enter = $("#student_password_re_enter").val();
					
					
					if( /^[^-\s][a-zA-Z_\s-]+$/.test(student_first_name)){
						
						$('#error_student_first_name').html("");
					}else{
						
					valid = false;
						
					if(student_first_name == ""){
						$('#error_student_first_name').html("Please enter something.");
							
						}else{
						$('#error_student_first_name').html("Please no specail characters.");
						}
					}
					
					
					
					if( /^[^-\s][a-zA-Z_\s-]+$/.test(student_last_name)){
						
						$('#error_student_last_name').html("");
					}else{
						valid = false;
						if(student_last_name == ""){
							$('#error_student_last_name').html("Please enter something");
							
						}else{
							$('#error_student_last_name').html("Please no specail characters.");
						}
					}
					
					if(student_program == "default"){
						$('#error_student_program').html("Please select an option.");
						valid = false;
					}else{
						$('#error_student_program').html("");
						
					}
					
					if( /(\W|^)[\w.+\-]*@dmacc\.edu(\W|$)/.test(student_username)){
						$('#error_student_username').html("");
					}else{
						valid = false;
						$('#error_student_username').html("Enter a Dmacc email.");
						
					}
					
					
					
					if( /^(?:(?:https?|ftp):\/\/)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/\S*)?$/.test(student_portfolio)){
						$('#error_student_portfolio').html("");
						}
						else{
						valid = false;
						$('#error_student_portfolio').html("This is not a valid web address.");
					}
					
					
					
					if( /^(?:(?:https?|ftp):\/\/)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/\S*)?$/.test(student_linkedin)){
						$('#error_student_linkedin').html("");
					}else{
						valid = false;
						$('#error_student_linkedin').html("This is not a valid web address.");
						
					}
					
					
					
					if( /^(?:(?:https?|ftp):\/\/)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/\S*)?$/.test(student_secondary)){
						$('#error_student_secondary').html("");
					}
					else{
						valid = false;
						$('#error_student_secondary').html("This is not a valid web address.");
					}
					
					
					
					if( /^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/.test(student_hometown)){
						$('#error_student_hometown').html("");
					}
					else{
						valid = false;
						$('#error_student_hometown').html("Please enter your hometown");
					}
					
					
		/*
					if(student_career_goals == ""){
						valid = false;
						$('#error_student_career_goals').html("Please enter something.");
					}
					else{
						
						$('#error_student_career_goals').html("");
					}
		
					
					
					if(student_hobbies == ""){
						valid = false;
						$('#error_student_hobbies').html("Please enter something.");
					}
					else{
				
						$('#error_student_hobbies').html("");
					}
		*/			
					
					if(student_state == "none"){
						valid = false;
						$('#error_student_state').html("Please select a state.");
					}
					else{
						
						$('#error_student_state').html("");
					}
					
					
					if(student_password == ""){
						
						valid = false;
						$('#error_student_password').html("Please enter a password.");
					}
					
					if(student_password.length < 6 ){
						
						valid = false;
						$('#error_student_password').html("Password is not long enough");
						
					}
					else{
						
						$('#error_student_password').html("");
					}
					
					if(student_password_re_enter == ""){
						
							valid = false;
							$('#error_student_password_re_enter').html("Please enter a password.");
						}else if(student_password_re_enter != student_password){
							valid = false;
							$('#error_student_password_re_enter').html("Passwords do not match.");
							
					}else{
						$('#error_student_password_re_enter').html("");
					}
					
					
					
					if(valid == true){
						//alert("passed");
						document.getElementById("submit").click();	
					}
					
				};
		
		</script>
	

	

	<body>
		<div id = "wrapper">


			<content id = "main">
		<?
		// $student_ID = $_GET['student_ID'];
		// echo $student_ID;
		if($form_complete == false){
		?>
			<form id="form1" name="form1" method="post" action= "<?php echo htmlentities($_SERVER['PHP_SELF']); ?> ">
				<img src = "HeaderLogo.png" alt = "Dmacc Portfolio Day">
				<h3>Info submission Form</h3>
				<table width="800" border="0">
				<tr>
					<td>User Name (your Dmacc Email): </td>
					<td><input type="text" name="student_username" id="student_username" size="15" value = "<?php echo htmlspecialchars($student_username); ?>" /></td>
					<td class="error"><?php echo $student_username_error; ?> <span id = "error_student_username"></span></td>
				</tr>
				<tr>
					<td>Password: </td>
					<td><input type="password" name="student_password" id="student_password" size="15" value = "<?php echo htmlspecialchars($student_password); ?>" /></td>
					<td class="error"><?php echo $student_password_error; ?><span id = "error_student_password"></span></td>
				</tr>
				<tr>
					<td>Enter Password again: </td>
					<td><input type="password" name="student_password_re_enter" id="student_password_re_enter" size="15" value = "<?php echo htmlspecialchars($student_password); ?>" /></td>
					<td class="error"><?php echo $student_password_re_enter_error; ?><span id = "error_student_password_re_enter"></span></td>
				</tr>
				<tr>
					<td>First name: </td>
					<td width="246"><input type="text" name="student_first_name" id="student_first_name" size="15" value = "<?php echo htmlspecialchars($student_first_name); ?>" /></td>
					<td width="210" class="error"><?php echo $student_first_name_error; ?><span id = "error_student_first_name"></span></td>
				</tr>
				<tr>
					<td>Last Name: </td>
					<td><input type="text" name="student_last_name" id="student_last_name" size="15" value = "<?php echo htmlspecialchars($student_last_name); ?>" /></td>
					<td class="error"><?php echo $student_last_name_error; ?><span id = "error_student_last_name"></span></td>
				</tr>
				<tr>
					<td >Program:</td>
					<td> <select id="student_program" name="student_program">
						<option value="default">---Select Your Program---</option>
						<option value="animation" >Animation</option>
						<option value="graphicDesign" >Graphic Design</option>
						<option value="photography" >Photography</option>
						<option value="videoProduction" >Video Production</option>
						<option value="webDevelopment" >Web Development</option>
						</select><br><span class="student_program_error" id="student_program_error"></span>
					</td>
					<td class="error"><?php echo $student_program_error; ?><span id = "error_student_program"></span></td>
				</tr>
				<tr>
					<td>Emphasis</td>
					<td><textarea name="message" rows="10" cols="30" id = student_emphasis></textarea></td>
				</tr>
				<tr>
					<td>Portfolio: </td>
					<td><input type="text" name="student_portfolio" id="student_portfolio" size="15" value = "<?php echo htmlspecialchars($student_portfolio); ?>" /></td>
					<td class="error"><?php echo $student_portfolio_error; ?><span id = "error_student_portfolio"></span></td>
				</tr>
				<tr>
					<td>LinkedIn:</td>
					<td><input type="text" name="student_linkedin" id="student_linkedin" size="15" value = "<?php echo htmlspecialchars($student_linkedin); ?>" /></td>
					<td class="error"><?php echo $student_linkedin_error; ?><span id = "error_student_linkedin"></span></td>
				</tr>
				<tr>
					<td>Secondary Website:</td>
					<td><input type="text" name="student_secondary" id="student_secondary" size="15" value = "<?php echo htmlspecialchars($student_secondary); ?>" /></td>
					<td class="error"><?php echo $student_secondary_error; ?><span id = "error_student_secondary"></span></td>
				</tr>
				<tr>
					<td>Hometown: </td>
					<td><input type="text" name="student_hometown" id="student_hometown" size="15" value = "<?php echo htmlspecialchars($student_hometown); ?>" /></td>
					<td class="error"><?php echo $student_hometown_error; ?><span id = "error_student_hometown"></span></td>
				</tr>
				<tr>
					<td>Career Goals: </td>
					<td><textarea name="student_career_goals" id="student_career_goals" rows="10" cols="30" value = "<?php echo htmlspecialchars($student_career_goals); ?>"></textarea></td>
					<td class="error"><?php echo $student_career_goals_error; ?><span id = "error_student_career_goals"></span></td>
				</tr>
				<tr>
					<td>Hobbies: </td>
					<td><textarea name="student_hobbies" rows="10" cols="30" id="student_hobbies" size="15" value = "<?php echo htmlspecialchars($student_hobbies); ?>"></textarea></td>
					<td class="error"><?php echo $student_hobbies_error; ?><span id = "error_student_hobbies"></span></td>
				</tr>
				<tr>
					<td >State:</td> 
					<td>
					<select id="student_state" name="student_state">
						<option value="none" >---State not selectted---</option>
						<option value="AL" >AL</option>
						<option value="AK" >AK</option>
						<option value="AZ" >AZ</option>
						<option value="AR" >AR</option>
						<option value="CA" >CA</option>
						<option value="CO" >CO</option>
						<option value="CT" >CT</option>
						<option value="DE" >DE</option>
						<option value="FL" >FL</option>
						<option value="GA" >GA</option>
						<option value="HI" >HI</option>
						<option value="ID" >ID</option>
						<option value="IL" >IL</option>
						<option value="IN" >IN</option>
						<option value="IA" >IA</option>
						<option value="KS" >KS</option>
						<option value="KY" >KY</option>
						<option value="LA" >LA</option>
						<option value="ME" >ME</option>
						<option value="MD" >MD</option>
						<option value="MA" >MA</option>
						<option value="MI" >MI</option>
						<option value="MN" >MN</option>
						<option value="MS" >MS</option>
						<option value="MO" >MO</option>
						<option value="MT" >MT</option>
						<option value="NE" >NE</option>
						<option value="NV" >NV</option>
						<option value="NH" >NH</option>
						<option value="NJ" >NJ</option>
						<option value="NM" >NM</option>
						<option value="NY" >NY</option>
						<option value="NC" >NC</option>
						<option value="ND" >ND</option>
						<option value="OH" >OH</option>
						<option value="OK" >OK</option>
						<option value="OR" >OR</option>
						<option value="PA" >PA</option>
						<option value="RI" >RI</option>
						<option value="SC" >SC</option>
						<option value="SD" >SD</option>
						<option value="TN" >TN</option>
						<option value="TX" >TX</option>
						<option value="UT" >UT</option>
						<option value="VT" >VT</option>
						<option value="VA" >VA</option>
						<option value="WA" >WA</option>
						<option value="WV" >WV</option>
						<option value="WI" >WI</option>
						<option value="WY" >WY</option>
						</select><br><span class="student_state_error" id="student_state_error"></span>
					</td>
					<td class="error"><?php echo $student_state_error; ?><span id = "error_student_state"></span></td>
				</tr>
				</table>
				<input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" /><br >
				<p>
					<input type="button" name="button" id="button" value="Register" onclick = "Verify()" />
					<input type="submit" name="button2" id="button2" value="Clear Form" />
					
					<input type="submit" name="submit" id="submit" value="submit" />

				</p>
			</form>	
			
<script>
grecaptcha.ready(function() {
    grecaptcha.execute('<?php echo SITE_KEY; ?>', {action: 'homepage'}).then(function(token) {
      document.getElementById('g-recaptcha-response').value=token; 
    });
});
</script>
			
		<?
		}else{
			?>
			
			<h1><b>Form complete, Thank you</b></h1><br>
			<h1><b><a href = "http://kmoonpage.com/Prototypes/StudentLogin.php">Login Page</a></b></h1><br>
			<h1><b><a href = "http://kmoonpage.com/Prototypes/Logout.php">Logout</a></b></h1><br>
			<h1><b><a href = "http://kmoonpage.com/Prototypes/displayStudent.php">Back</a></b></h1><br>
			<?
		}
		?>
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
