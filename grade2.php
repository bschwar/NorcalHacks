<?php
require_once("model.php");
	require("header.php");
?>
<h1 id="center3">Assignments</h1>
<?php

	$pages=listAss2($_SESSION['class']);
		$name="";
		while($row = $pages->fetch_assoc()){
			$str=$row['name'];
			$str2=$row['user_id'];
			if($row['name'] != $name){
				$name=$row['name'];
				echo"<h2 style='text-decoration:underline;'>$name<h2/>";
			}
			if($row['score']==-1){
				echo "<div id='adminblue'><a href='details2.php?name={$str}&id={$str2}'>{$row['username']}: {$row['name']}</a></div>";
			}else{
				echo "<div id='admin'><a href='details2.php?name={$str}&id={$str2}'>{$row['username']}: {$row['name']}</a></div>";
			}
		}
	require("footer.php");