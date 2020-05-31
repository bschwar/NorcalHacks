    <?php
    include("config.php");
	require_once("model.php");
	require("header.php");
	$class=$_SESSION['class'];
	$id=$_SESSION['id'];
	$assign=$_GET['name'];
    if(isset($_POST['but_upload'])){
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
            $query = "UPDATE scores SET filename='".$name."', file='".$image."' WHERE user_id='".$id."' AND class_id= '".$class."' AND name='".$assign."'";
			
            mysqli_query($con,$query) or die(mysqli_error($con));
            
            // Upload file
            move_uploaded_file($_FILES['file']['tmp_name'],'upload/'.$name);

        }
    
    }
	$pages=getAss($_SESSION['class'], $_SESSION['id'], $_GET['name']);
	$name=$pages['name'];
	$date=$pages['Date'];
	$des=$pages['Description'];
	$file=$pages['file'];
	$score=$pages['score'];
	echo"<h1 id='center3'>Assignment: $name</h1>";
	if($score == -1){
		echo"<div id='center3'>Not Graded</div>";
	}else{
		echo"<div id='center3'>Score: $score%</div>";
	}
		echo"<h2 id='center3'>$date</h2>";
	echo"<p><span style='text-decoration:underline;'>Description:</span> $des</p>";


?>
    <form method="post" action="" enctype='multipart/form-data'>
        <input type='file' name='file' />
        <input type='submit' value='Save name' name='but_upload'>
        
    </form>
<?php
	require("footer.php");
