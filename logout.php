  <?php
  #clear the session to end the user's current onteraction
	require_once("model.php");
	session_destroy();
	require("header.php");
 
 header("Location: index.php"); 
		exit(0);
 
	require("footer.php");