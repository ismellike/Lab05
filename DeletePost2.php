<?php echo "<html>
	<head>
		<title>Delete Posts</title>
	</head>
	<body>
	<form action='DeletePost2.php' method='post'>";
				#establish connections
			$mysql = new mysqli("mysql.eecs.ku.edu","glopez", 'P@$$word123', "glopez");
			#check connection
			if($mysql->connect_errno) 
			{
				printf('Connect failed to mysql.');
				exit();
			} 
			if($result = $mysql->query("SELECT * FROM Posts"))
			{
			echo "<table>";
			echo "<tr><th>Author</th><th>Post</th><th>Delete?</th></tr>";
			while($row = $result->fetch_assoc())
			{
				echo "<tr><td>".$row["author_id"]."</td><td>".$row["content"]."</td><td><input type='checkbox' name='delete' value='".$row["post_id"]."'></td></tr>";
			}
			echo "</table>";
			$result->free();
			}
			$mysql->close();
			
		echo "<input type='submit'>
		</form>
	</body>
</html>";
?>

