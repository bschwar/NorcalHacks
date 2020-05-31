<!DOCTYPE html>
<html>
<head>
<style>
body{
	background-color: #000000;
}
.container {
	display: float;
	float:right;
  position: relative;
  width: 49%;
overflow: hidden;
background: rgba(0, 0, 0, 0.8);
border: solid white 5px;
}
.logo{
	display:block;
	position: absolute;
	margin-right:auto;
margin-left:auto;
vertical-align:middle;

}
.logo2{
	width:300px;
	height:300px;
	
	position: absolute;
	margin-left:490px;
	margin-top:250px;

}
.image {
  opacity: 1;
  display: block;
  transition: .5s ease;
  backface-visibility: hidden;
	height: 790px;
	overflow: hidden;
opacity: 0.3;

}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%)
}

.container:hover .image {
	opacity: 1;
	transform: scale(1.1);
	
}


.container:hover{
background: rgba(0, 0, 0, 0.8);
}

</style>
</head>
<body>
<div class="container">
  <a href="index.php"><img  src="tc.png"  class="image" style="width:100%"><a/>
</div>
<div class="container">
  <a href="indexg.php"><img src="games.png"  class="image" style="width:100%"><a/>
</div>
<div class="logo">
  <img class="logo2" src="logologo.png">
</div>
  
</body>
</html>