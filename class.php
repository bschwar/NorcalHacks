  <?php
	require_once("model.php");
	require("header.php");
	#Set session to the class code given
	if(isset($_POST['action']) && $_POST['action'] == "Login"){
		$pages=getPages2();
		$count=0;
		while($row = $pages->fetch_assoc()){
			if(($row['name']===$_POST['classN'])&&($row['id']==$_POST['class'])){
				$count=1;
			}
		}
		if($count==1){
			setup( $_SESSION['id'] ,$_POST['class'], $_POST['classN']);
			echo"<div class='msg'>Class Joined <a href='index.php'>Home</a></div>";
		}else{
			echo"<div class='error'>Class not found</div>";
		}
		
	}
	
 ?>
 <a href="index.php"><img id="center4" src="logologo.png"/></a>
	<h1>Enter Class</h1>
	<form method="post" action="">
		<div>Class Name</div>
		<input type="text" name="classN"/>
		<div>
		<div>Class Code</div>
		<input type="text" name="class"/>
		<div>
			<input type="submit" name="action" value="Login"/>
		</div>
	</form> 
 <?php 
	require("footer.php");