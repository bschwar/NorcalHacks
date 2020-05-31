<?php
require_once("model.php");
	require("header.php");
?>
<h1 id="center3">What will you learn today?</h1>
<?php

if(!(isset($_SESSION['teacher']))|| $_SESSION['teacher'] == NULL){
	$pages=listAss($_SESSION['class'], $_SESSION['id']);
		while($row = $pages->fetch_assoc()){
			$str=$row['name'];
			if($row['score']==-1){
			echo "<div id='adminblue'><a href='details.php?name={$str}'>{$row['name']}</a></div>";
			}else{
			echo "<div id='admin'><a href='details.php?name={$str}'>{$row['name']}</a></div>";	
			}
		}
}else{
echo"<div id='admin'><br/><a href='addass.php'>Make Assignment</a><br/><br/></div>";
}
	require("footer.php");
