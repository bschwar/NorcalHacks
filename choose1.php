<?php
require_once("model.php");
	require("header2.php");
	
	$count=$_GET['count'];
	
?>
<a href="indexg.php"><img id="center4" src="logologo.png"/></a>
<div id='choose1'>
<?php
$pages=listCho($count);
$row = $pages->fetch_assoc();
$img=$row['error'];
echo"
<img id='scene' src='$img'/></a>";
?>
<div id='choose2'>
<br/>
<?php
$count-=1;
echo"
<span id='choose'><a href='choose.php?count=$count&ans=1'>Return to story</a></span>";
?>
</div>
</div>
<?php	
	require("footer.php");
