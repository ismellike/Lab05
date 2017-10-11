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

//check if person exists
if($result = $mysql->query("SELECT * FROM Users"))
{
	while($row = $result->fetch_assoc())
	{
		if($row["user_id"] == $user)
		{
			echo "The user already exists.";
			exit();
		}
	}
	$result->free();
}

$mysql->query("INSERT INTO Users (user_id) VALUES ('$user')");
echo "The User was saved into the database.";
$mysql->close();
?>
