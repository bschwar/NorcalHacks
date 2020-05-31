<?php
require_once("model.php");
	require("header2.php");
	
	if(!isset($_GET['count'])){
		$count=0;
	}
	else{
		$count=$_GET['count'];
		if($count == 21){
			header("Location: indexg.php");
			exit(0);
		}
	}
	if(isset($_GET['ans'])&&($_GET['ans']==1)){
		$count+=1;
	}else{
		header("Location: choose1.php?count=$count");
		exit(0);
	}
	
?>
<a href="indexg.php"><img id="center4" src="logologo.png"/></a>
<?php
$pages=listCho($count);
$row = $pages->fetch_assoc();
$img=$row['filename'];
	echo"
	<div id='choose1'>
	<img id='scene' src='$img'/></a>
	<div id='choose2'>
	</br>";
	$pages=listCho($count);
		while($row = $pages->fetch_assoc()){
			$ans=$row['ans'];
			$name=$row['name'];
			echo "<span id='choose'><a href='choose.php?ans=$ans&count=$count'>$name</a></span>";
		}

echo"
</div>
</div>";
	
	require("footer.php");
