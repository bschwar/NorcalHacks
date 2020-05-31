<?php
	require_once("model.php");
?>
<!DOCTYPE html>
 <head>
	<meta charset="UTF-8"/>
	<title>Aristotle's Classroom</title>
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
<! nav bar !>
<div class="topnav">
  <a href="index3.php">Home</a>
  <a href="about.php">About</a>
  <a href="contact.php">Contact Us</a>
  				<?php
				if(isset($_SESSION['loggedIn'])&& $_SESSION['loggedIn'] == true){
					echo"<a href='logout.php'>Logout</a> ";

					if(!(isset($_SESSION['teacher']))|| $_SESSION['teacher'] == NULL){
						if(isset($_SESSION['class'])&& $_SESSION['class'] == true){
							echo"<a href='exit.php'>Leave Class</a>";
						}else{
							echo "<a href='class.php'>Join Class</a> ";
						}
					}
					else{
						echo "<a href='add.php'>Create Class</a> ";
						
					}
				}else{
					echo "<a href='login.php'>Login</a> <a href='signup.php'>Sign Up</a> ";
				
				}
				?>

  <! search bar!>
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
<?php
if(isset($_SESSION['class'])){
	$class=$_SESSION['class'];

	echo "<div class='topnav'>
	  <a href='chat.php?$class'>Chat</a>
	  <a href='assignments.php?$class'>Assignments</a>
	  <a href='announcments.php?$class'>Announcments</a>";
	if(!(isset($_SESSION['teacher']))|| $_SESSION['teacher'] == NULL){
		echo "<a href='grades.php?$class'>Graded Work</a> ";
	}else{
		echo "<a href='grade2.php?$class'>Grade Work</a> ";
		echo "<a href='grade.php?$class'>Graded Work</a> ";
		}
	echo "<a href='database.php?$class'>Database</a>";
	 echo "</div>";


}
?>	
		
			
			
		</header>
		
