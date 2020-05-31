<?php
require_once("model.php");
	require("header.php");
	if(isset($_POST['action']) && $_POST['action'] == "chat"){
	addChat($_SESSION['name'], $_POST['chat'], $_SESSION['class']);
	}
	
?>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>	
<script type="text/javascript">
    window.onload = setupRefresh;
    function setupRefresh()
    {
        setInterval("refreshChat();",100);
    }
    
    function refreshChat()
    {
       $('#yea2').load("chat.php #yea2");
    }
  </script>
<h1 id="center3">Chatroom</h1>
<div id="yea">
<div id="yea2">
<?php
$pages=listChat($_SESSION['class']);
		while($row = $pages->fetch_assoc()){
			if($_SESSION['name']==$row['name']){
				echo "<div id='chat2'><a><span style='float: right'>{$row['name']}: {$row['contents']}</span><br/><span style='float: left'>{$row['time']}</span></a></div>";
			}else{
				echo "<div id='chat'><a><span style='float: left'>{$row['name']}: {$row['contents']}</span><br/><span style='float: right'>{$row['time']}</span></a></div>";
			}
		}
?>
</div>
</div>
<form id="login3" method="post" action="">
		<input type="text" name="chat" placeholder="What are you thinking?"/>
		<div>
			<input type="submit" name="action" value="chat"/>
		</div>
	</form> 
<?php
	require("footer.php");
