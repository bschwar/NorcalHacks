<?php
require_once("model.php");
	require("header.php");
	
	
?>
<a href="index.php"><img id="center" src="logologo.png"/></a>
			<h1 id="center2">Aristotle's Classroom</h1>
<h1 id="center3">What will you learn today?</h1>

<?php
if(!isset($_SESSION['class'])){
	if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
		$pages=getClasses($_SESSION['id']);
		while($row = $pages->fetch_assoc()){
			echo "<div id='admin'><br/><a href='enter.php?id={$row['class_id']}'>{$row['class_name']}</a><br/><br/></div>";
		}
	}
}
			
	require("footer.php");
