  <?php
	require_once("model.php");
	require("header.php");
	
	if(isset($_POST['action']) && $_POST['action'] == "Sign Up"){
		if($_POST['password'] != $_POST['confirm_password']){
			$error = "Passwords do not match";
		}else{
			if(trim($_POST['username']) != "" && trim($_POST['firstName']) != "" && trim($_POST['lastName']) != ""){
				if($_POST['teacher'] != NULL){
					$id = addUser($_POST);
				}else{
					$id = addUser2($_POST);
				}
			
				
				if($id === null){
					$error = "Error creating user.";
				}else{
					$message = "<div class='msg'>User created! <a href='login.php'>Login</a></div>";
				}
			}else{
				$error = "please make sure you have filled in all fields";
			}
		}
	}
 ?>
	<header>
		<script>
		function validateForm() {
		var x = document.forms["myForm"]["username"].value;
		if (x == "" || x == null) {
			alert("username must be filled out");
    	return false;
		}
		var y = document.forms["myForm"]["password"].value;
		if (y == "" || y == null) {
			alert("password must be filled out");
    	return false;
		}
		var z = document.forms["myForm"]["firstName"].value;
		if (z == "" || z == null) {
			alert("first name must be filled out");
    	return false;
		}
		var a = document.forms["myForm"]["lastName"].value;
		if (a == "" || a == null) {
			alert("last name must be filled out");
    	return false;
		}
		}
		</script>
	</header>
	 <h1 id="center3">Sign-Up</h1>
	<?php
	if(isset($error)){
		echo "<div class='error'>$error</div>";
	}
	if(isset($message)){
		echo $message;
	}
	?>
	<form id="signup" name="myForm" method="post" action="" onsubmit="return validateForm()">
		
		<input type="text" name="username" placeholder="Username"/>
		<input type="password" name="password" placeholder="Password"/>
		<input type="password" name="confirm_password" placeholder="Confirm Password"/>
		<input type="text" name="firstName" placeholder="First Name"/>
		<input type="text" name="lastName" placeholder="Last Name"/>
		<div>If you are a teacher please enter a teacher id</div>
		<input type="text" name="teacher" placeholder="Teacher Id"/>
		<div>
			<input type="submit" name="action" value="Sign Up"/>
		</div>
	</form> 
 <?php 
	require("footer.php");