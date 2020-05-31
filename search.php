<?php
require_once("model.php");
	require("header.php");
	
	
?>

<h1 id="center4" >Search Page</h1>

<?php
	$str= $_GET['srch'];
	#Return all possible pretests with the right name
	if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
		$pages=getPretest2($_SESSION['id'], $str);
		while($row = $pages->fetch_assoc()){
			echo "<div id='admin'><br/><a href='pretest.php?id={$row['id']}'>{$row['name']}</a><br/></div>";
		}
	}
	#Return all possible tutor pages with the right name
	if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
		$pages=getTutor2($_SESSION['id'], $str);
		while($row = $pages->fetch_assoc()){
			echo "<div id='adminblue'><br/><a href='tutor.php?id={$row['id']}'>{$row['name']}</a><br/></br></div>";
		}
	}
	require("footer.php");