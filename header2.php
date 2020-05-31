<?php
	require_once("model.php");
?>
<!DOCTYPE html>
 <head>
	<meta charset="UTF-8"/>
	<title>Aristole's Classroom</title>
	<link rel="stylesheet" href="main.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<?
if($_GET['action'] == "search.php"){
	 header("Location: search.php?srch={$_GET['srch']}"); 
		exit(0);
}
?>
	<div id="wrapper">

<header>

<div class="topnav">
  <a href="index3.php">Home</a>
  <a href="about.php">About</a>
  <a href="contact.php">Contact Us</a>
  				
  <form id="search" name="myForm" method="get" action="search.php" >
    <input id="myInput" name="srch" type="text" placeholder="Search..">
    <button id="myBtn" type="submit" value="search.php" style="display: none">Button</button>
  </form>
  <script>
var input = document.getElementById("myInput");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   document.getElementById("myBtn").click();
  }
});
</script>
</div>
			
		</header>
		
