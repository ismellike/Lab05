<?php
$users = new mysqli("mysql.eecs.ku.edu","glopez", "P@$$word123", "Users");
$posts = new mysqli("mysql.eecs.ku.edu","glopez", "P@$$word123", "Posts");

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


?>
