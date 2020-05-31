<?php
	require_once("model.php");
	
	if(isset($_POST['action']) && $_POST['action'] == "Add Page"){
		$result=addPage($_POST['name'],$_SESSION['id']);
		setup( $_SESSION['id'] ,$result, $_POST['name']);
		$msg= "<div class='msg'>Page {$_POST['name']} was added. <a href='index.php'>Home</a></div>";
	}
	require("header.php");
?>
	<h1>Make Class</h1>
	<?php
	if(isset($msg)){
		echo $msg;
	}
	?>
	<form method="post" action="">
		<div>Name:</div>
		<input type="text" name="name"/><br/>
		<input type="submit" name="action" value="Add Page"/>
	</form>
<?php
require("footer.php");