<?php
//establish connections
$mysql = new mysqli("mysql.eecs.ku.edu","glopez", 'P@$$word123', "glopez");

//check connection
if($mysql->connect_errno) 
{
	printf("Connect failed to mysql.");
	exit();
}

//read input
$user = $_POST["user"];
if($user == "")
{
	echo "The user field cannot be left empty.";
	exit();
}

if($mysql->query("SELECT * FROM Users WHERE user_id=".$user.";") != "")
{
	echo "The user already exists in the table.";
	exit();
}

$mysql->query("INSERT INTO Users (user_id) VALUES (".$user.");")

$mysql->close();
?>
