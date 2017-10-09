<?php
//establish connections
$users = new mysqli("mysql.eecs.ku.edu","glopez", "P@$$word123", "Users");
$posts = new mysqli("mysql.eecs.ku.edu","glopez", "P@$$word123", "Posts");

//check connections
if($users->connect_errno) 
{
	printf("Connect failed: %s\n", $users->connect_errno);
	exit();
}
if($posts->connect_errno)
{
	printf("Connect failed: %s\n", $posts->connect_errno);
	exit();
}

//read input
$user = $_POST["user"];
if($user == "")
{
	echo "The user field cannot be left empty.";
	exit();
}

if($result = $users->query("SELECT Users FROM user_id"))
{
	while($row = $results->fetch_assoc())
	{
		echo $row["user_id"];
	}
	$results->free();
}

$users->close();
$posts->close();
?>
