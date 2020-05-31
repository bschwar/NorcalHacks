    <?php
    include("config.php");
	require_once("model.php");
	require("header.php");
	$class=$_SESSION['class'];
	$id=$_SESSION['id'];
    if(isset($_POST['but_upload'])){
	$type=$_POST['type'];
        $name = $_FILES['file']['name'];
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);

        // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");

        // Check extension
        if( in_array($imageFileType,$extensions_arr) ){
            
            // Convert to base64 
            $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
            $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;

            // Insert record
            $query = "insert into teacher(class_id,type,file,filename) values('".$class."','".$type."','".$image."','".$name."')";
			
            mysqli_query($con,$query) or die(mysqli_error($con));
            
            // Upload file
            move_uploaded_file($_FILES['file']['tmp_name'],'upload/'.$name);

        }
    
    }
	echo'<h1 id="center3">Database</h1>';
	$pages=listData($_SESSION['class']);
		$type=-1;
		while($row = $pages->fetch_assoc()){
			if($row['type'] != $type){
				$type=$row['type'];
				echo"<h2>UNIT: $type<h2/>";
			}
				$name=$row['filename'];
				echo "<div id='admin'><a href='details3.php?name=$name'>{$row['filename']}</a></div>";
		}
	
	if(!(isset($_SESSION['teacher']))|| $_SESSION['teacher'] == NULL){
		
	}else{
?>
    <form method="post" action="" enctype='multipart/form-data'>
		<input type='text' name='type' placeholder='Unit' />
        <input type='file' name='file' />
        <input type='submit' value='Save name' name='but_upload'>
        
    </form>
<?php
	}
	require("footer.php");
