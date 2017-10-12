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
$post = $_POST["post"];
if($user == "")
{
	echo "The user field cannot be left empty.";
	exit();
}
if($post == "")
{
	echo "The post cannot be empty.";
	exit();
}

//check if person exists
if($result = $mysql->query("SELECT * FROM Posts"))
{
	while($row = $result->fetch_assoc())
	{
		if($row["content"] == $post)
		{
			echo "The post already exists.";
			exit();
		}
	}
	$result->free();
}

$mysql->query("INSERT INTO Posts (content, author_id) VALUES ('$post', '$user')");
echo "The Post was saved into the database.";
$mysql->close();
?>
