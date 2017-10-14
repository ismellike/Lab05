<?php
//establish connections
$mysql = new mysqli("mysql.eecs.ku.edu","glopez", 'P@$$word123', "glopez");

//check connection
if($mysql->connect_errno) 
{
	printf("Connect failed to mysql.");
	exit();
}

if($result = $mysql->query("SELECT * FROM Users"))
{
	echo "<table>";
	echo "<tr><th>user_id</th></tr>";
	while($row = $result->fetch_assoc())
	{
	echo "<tr><td>".$row["user_id"]."</td></tr>";
	}
	echo"</table>";
	$result->free();
}
$mysql->close();
?>