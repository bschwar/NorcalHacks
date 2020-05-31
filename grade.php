<?php
require_once("model.php");
	require("header.php");
?>
<h1 id="center3">Graded Work</h1>
<table>
<?php
$pages=listAss2($_SESSION['class']);

		$name="";
		while($row = $pages->fetch_assoc()){
			
			if($row['name'] != $name){
				$name=$row['name'];
				echo"</table>";
				echo'</br><table cellpadding="0"; cellspacing="0">
        <tr>
            <td width=300><div id="table2">Assignment</td>
			<td width=300><div id="table2">Name</td>
            <td width=250><div id="table2">Score</td>
			
        </tr>';
			}
			$username=$row['username'];
			$date=$row['Date'];
			$des=$row['Description'];
			$file=$row['file'];
			$score=$row['score'];
			if($score == -1){
		
			}else{
				echo"<tr>
            <td><div id='table2'>$name</td>
			<td><div id='table2'>$username</td>
            <td><div id='table2'>$score%</td>
        </tr>";
			}
	
		}
		