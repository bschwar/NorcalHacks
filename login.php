  <?php
  #make sure the user has the right info, then logs the user in with $_SESSION variables
	require_once("model.php");
	if(isset($_POST['action']) && $_POST['action'] == "Login"){
		$result=verifyUser($_POST['username'], $_POST['password']);
		if($result !== false){
			$_SESSION['name']= $result['username'];
			$_SESSION['user'] = $result;
			$_SESSION['loggedIn'] = true;
			$_SESSION['id'] = $result['id'];
			$_SESSION['teacher']= $result['teacher'];
			header("Location: index.php"); 
			exit(0);
		}else{
			$error = "Username or Passwors Incorrect.";
		}
	}
	require("header.php");
 ?>
 <h1 id="center3">Sign in</h1>
	<?php
	if(isset($error)){
		echo "<div class='error'>$error</div>";
	}
	if(isset($message)){
		echo $message;
	}
	?>
	
	<form id="login3" method="post" action="">
		<input type="text" name="username" placeholder="Username"/>
		<input type="password" name="password" placeholder="Password"/>
		<div>
			<input type="submit" name="action" value="Login"/>
		</div>
	</form> 
 <?php 
	require("footer.php");