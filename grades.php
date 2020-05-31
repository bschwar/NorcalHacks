<?php
require_once("model.php");
	require("header.php");
?>

<h1 id="center3">Graded Work</h1>
<?php
$pages=listAss($_SESSION['class'], $_SESSION['id']);
echo'<table cellpadding="0"; cellspacing="0">
        <tr>
            <td width=300><div id="table2">Assignment</td>
            <td width=250><div id="table2">Score</td>
        </tr>';
		while($row = $pages->fetch_assoc()){
			$name=$row['name'];
			$date=$row['Date'];
			$des=$row['Description'];
			$file=$row['file'];
			$score=$row['score'];
			if($score == -1){
		
			}else{
				echo"<tr>
            <td><div id='table2'>$name</td>
            <td><div id='table2'>$score%</td>
        </tr>";
			}
	
		}
		echo"</table>";
