<?php
session_start();

$connection = new mysqli("localhost","root","","norcal");
if($connection->connect_error){
	die("Failed to connect to database");
}
function listChat($teacher){
	global $connection;
	$sql = "select * FROM chat WHERE code=? AND type=0 ORDER BY id ASC ";
	$statement = $connection->prepare($sql);
	$statement->bind_param("i", $teacher);
	$statement->execute();
	$result = $statement->get_result();
	return $result;	
}
function listData($teacher){
	global $connection;
	$sql = "select * FROM teacher WHERE class_id=? ORDER BY type ASC";
	$statement = $connection->prepare($sql);
	$statement->bind_param("i", $teacher);
	$statement->execute();
	$result = $statement->get_result();
	return $result;	
}
function listAnow($teacher){
	global $connection;
	$sql = "select * FROM chat WHERE code=? AND type=1 ORDER BY id ASC";
	$statement = $connection->prepare($sql);
	$statement->bind_param("i", $teacher);
	$statement->execute();
	$result = $statement->get_result();
	return $result;	
}
function listAss($teacher, $id){
	global $connection;
	$sql = "select * FROM scores WHERE class_id=? AND user_id=?";
	$statement = $connection->prepare($sql);
	$statement->bind_param("ii", $teacher, $id);
	$statement->execute();
	$result = $statement->get_result();
	return $result;	
}
function listCho($type){
	global $connection;
	$sql = "select * FROM choose WHERE type=? ";
	$statement = $connection->prepare($sql);
	$statement->bind_param("i", $type);
	$statement->execute();
	$result = $statement->get_result();
	return $result;	
}
function listAss2($teacher){
	global $connection;
	$sql = "select * FROM scores WHERE class_id=? ORDER BY name ASC";
	$statement = $connection->prepare($sql);
	$statement->bind_param("i", $teacher);
	$statement->execute();
	$result = $statement->get_result();
	return $result;	
}
function getTeach($teacher,$name){
	global $connection;
	$sql = "select * FROM teacher WHERE class_id=? AND filename=?";
	$statement = $connection->prepare($sql);
	$statement->bind_param("is", $teacher, $name);
	$statement->execute();
	$result = $statement->get_result();
	$row = $result->fetch_assoc();
	return $row;	
}
function getAss($teacher, $id, $name){
	global $connection;
	$sql = "select * FROM scores WHERE class_id=? AND user_id=? AND name=?";
	$statement = $connection->prepare($sql);
	$statement->bind_param("iis", $teacher, $id, $name);
	$statement->execute();
	$result = $statement->get_result();
	$row = $result->fetch_assoc();
	return $row;	
}
function storeAss($teacher, $id, $name, $file){
	global $connection;
	$sql = "UPDATE scores SET file=? WHERE class_id=? AND user_id=? AND name=?";
	$statement = $connection->prepare($sql);
	$statement->bind_param("biis", $file, $teacher, $id, $name);
	$statement->execute();
}
function updateScore($teacher, $id, $name, $score){
	global $connection;
	$sql = "UPDATE scores SET score=? WHERE class_id=? AND user_id=? AND name=?";
	$statement = $connection->prepare($sql);
	$statement->bind_param("iiis", $score, $teacher, $id, $name);
	$statement->execute();
}
function addChat($name, $content, $teacher){
	global $connection;
	$sql = "INSERT INTO chat(name, contents, code) VALUES(?,?,?)";
	$statement = $connection->prepare($sql);
	$statement->bind_param("ssi", $name, $content, $teacher);
	$statement->execute();
}
function addAnow($name, $content, $teacher){
	global $connection;
	$sql = "INSERT INTO chat(name, contents, code, type) VALUES(?,?,?,1)";
	$statement = $connection->prepare($sql);
	$statement->bind_param("ssi", $name, $content, $teacher);
	$statement->execute();
}
function addAss($teacher, $user){
	global $connection;
	$sql="Select * FROM users LEFT JOIN classes ON users.id=classes.user_id WHERE class_id=? AND users.id != ?";
	$statement = $connection->prepare($sql);
	$statement ->bind_param("ii",$teacher, $user);
	$statement->execute();
	$result = $statement->get_result();
	return $result;
}
function addAss2($userid, $classid, $name, $username, $des, $date){
	global $connection;
	$sql = "INSERT INTO scores(user_id, class_id, name, username, Description, Date) VALUES(?,?,?,?,?,?)";
	$statement = $connection->prepare($sql);
	$statement->bind_param("iissss", $userid, $classid, $name, $username, $des, $date);
	$statement->execute();
}
function getPages($teacher){
	global $connection;
	$sql = "SELECT * FROM pages WHERE type=?";
	$statement = $connection->prepare($sql);
	$statement->bind_param("s", $teacher);
	$statement->execute();
	$result = $statement->get_result();
	return $result;	
}
function getPages2(){
	global $connection;
	$sql = "SELECT * FROM pages";
	$statement = $connection->prepare($sql);
	$statement->execute();
	$result = $statement->get_result();
	return $result;	
}
function setup($userid, $classid, $classname){
	global $connection;
	$sql = "INSERT INTO classes(user_id, class_id, class_name) VALUES(?,?,?)";
	$statement = $connection->prepare($sql);
	$statement->bind_param("iis", $userid, $classid, $classname);
	$statement->execute();
}
function getClasses($id){
	global $connection;
	$sql="Select * FROM classes WHERE user_id=?";
	$statement = $connection->prepare($sql);
	$statement ->bind_param("i",$id);
	$statement->execute();
	$result = $statement->get_result();
	return $result;
}
function getPage($id){
	global $connection;
	$sql="Select * FROM pages WHERE id=?";
	$statement = $connection->prepare($sql);
	$statement ->bind_param("i",$id);
	$statement->execute();
	$result = $statement->get_result();
	return $result;
}
function addUser($user){
	global $connection;
	$sql = "INSERT INTO users(username, password, firstName, lastName,teacher) VALUES(?,?,?,?,?)";
	$statement = $connection->prepare($sql);
	$statement->bind_param("sssss", $username, $password, $first, $last, $teacher);
	$username = $user['username'];
	$password = password_hash($user['password'], PASSWORD_DEFAULT);
	$first = $user['firstName'];
	$last = $user['lastName'];
	$teacher = $user['teacher'];
	$statement->execute();
	
	if($connection->errno != 0){
		return null;
	}
	
	return $connection->insert_id;
}
function addUser2($user){
	global $connection;
	$sql = "INSERT INTO users(username, password, firstName, lastName) VALUES(?,?,?,?)";
	$statement = $connection->prepare($sql);
	$statement->bind_param("ssss", $username, $password, $first, $last);
	$username = $user['username'];
	$password = password_hash($user['password'], PASSWORD_DEFAULT);
	$first = $user['firstName'];
	$last = $user['lastName'];
	$statement->execute();
	
	if($connection->errno != 0){
		return null;
	}
	
	return $connection->insert_id;
}
function addPage($name, $teacher){
	global $connection;
	$sql = "INSERT INTO pages (id, name, teacher_id) VALUES (NULL, ?, ?);";
	$statement = $connection->prepare($sql);
	$statement ->bind_param("si", $name, $teacher);
	$statement->execute();
	return $connection->insert_id;
}
function editPage($id, $name, $contents){
	global $connection;
	$sql="UPDATE pages set name=?, contents=? WHERE id=?";
	$statement = $connection->prepare($sql);
	$statement ->bind_param("ssi",$name,$contents, $id);
	$statement->execute();
}
function deletePage($id){
	global $connection;
	$sql = "DELETE FROM pages WHERE id=?";
	$statement = $connection->prepare($sql);
	$statement ->bind_param("i", $id);
	$statement->execute();
}
function deleteScore($id){
	global $connection;
	$sql = "DELETE FROM scores WHERE user_id=? AND score=-1";
	$statement = $connection->prepare($sql);
	$statement ->bind_param("i", $id);
	$statement->execute();
}
function verifyUser($username, $password){
	global $connection;
	$sql = "SELECT * FROM users WHERE username=?";
	$statement = $connection->prepare($sql);
	$statement->bind_param("s", $username);
	$statement->execute();
	$result = $statement->get_result();
	if($result->num_rows == 0){
		return false;
	}
	$row = $result->fetch_assoc();
	if(password_verify($password, $row['password'])){
		return $row;
	}
	return false;
}


