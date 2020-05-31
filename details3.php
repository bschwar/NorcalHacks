    <?php
	require_once("model.php");
	require("header.php");
	
	$pages=getTeach($_SESSION['class'], $_GET['name']);

$image = $pages['filename'];
$image_src = "upload/".$image;
echo"<h2>$image</h2>";
?>
<img width="800px" height="500px" src='<?php echo $image_src;  ?>' >
 <?php
	require("footer.php");
