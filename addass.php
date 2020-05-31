<?php
	require_once("model.php");
	require("header.php");
	if(isset($_POST['action']) && $_POST['action'] == "Add Page"){
		$pages=addAss($_SESSION['class'], $_SESSION['id']);
		while($row = $pages->fetch_assoc()){
			addAss2($row['id'], $_SESSION['class'],$_POST['name'],$row['username'],$_POST['des'],$_POST['date']);
		}
		if(($_POST['c2']=== "")||($_POST['c2']=== NULL)){
			}else{
				$pages=addAss($_POST['c2'], $_SESSION['id']);
				while($row = $pages->fetch_assoc()){
					addAss2($row['id'], $_POST['c2'],$_POST['name'],$row['username'],$_POST['des'],$_POST['date']);
				}
			}
		if(($_POST['c3']=== "")||($_POST['c3']=== NULL)){
			}else{
				$pages=addAss($_POST['c3'], $_SESSION['id']);
				while($row = $pages->fetch_assoc()){
					addAss2($row['id'], $_POST['c3'],$_POST['name'],$row['username'],$_POST['des'],$_POST['date']);
				}
			}
		if(($_POST['c4']=== "")||($_POST['c4']=== NULL)){
			}else{
				$pages=addAss($_POST['c4'], $_SESSION['id']);
				while($row = $pages->fetch_assoc()){
					addAss2($row['id'], $_POST['c4'],$_POST['name'],$row['username'],$_POST['des'],$_POST['date']);
				}
			}
		if(($_POST['c5']=== "")||($_POST['c5']=== NULL)){
			}else{
				$pages=addAss($_POST['c5'], $_SESSION['id']);
				while($row = $pages->fetch_assoc()){
					addAss2($row['id'], $_POST['c5'],$_POST['name'],$row['username'],$_POST['des'],$_POST['date']);
				}
			}
		if(($_POST['c6']=== "")||($_POST['c6']=== NULL)){
			}else{
				$pages=addAss($_POST['c6'], $_SESSION['id']);
				while($row = $pages->fetch_assoc()){
					addAss2($row['id'], $_POST['c6'],$_POST['name'],$row['username'],$_POST['des'],$_POST['date']);
				}
			}
	}
	
?>
	<h1>Make Assignment</h1>
	<?php
	if(isset($msg)){
		echo $msg;
	}
	?>
	<form method="post" action="">
		<div>Name:</div>
		<input type="text" name="name"/><br/>
		<div>Description:</div>
		<textarea name="des"/></textarea><br/>
		<div>Due date:</div>
		<input type="text" name="date"/><br/>
		<div>Do you want to give the assignment to multiple classes?</div>
		<input type="text" name="c2" placeholder="Second Class"/><br/>
		<input type="text" name="c3" placeholder="Third Class"/><br/>
		<input type="text" name="c4" placeholder="Fourth Class"/><br/>
		<input type="text" name="c5" placeholder="Fifth Class"/><br/>
		<input type="text" name="c6" placeholder="Sixth Class"/><br/>
		<input type="submit" name="action" value="Add Page"/>
	</form>
<?php
require("footer.php");

