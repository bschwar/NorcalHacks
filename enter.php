<?php
require_once("model.php");
	require("header.php");
	
$_SESSION['class']=$_GET['id'];
header("Location: index.php"); 
			exit(0);
	
			
	require("footer.php");
