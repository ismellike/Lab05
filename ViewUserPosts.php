<?php echo "<html>
	<head>
		<title>View User Posts</title>
	</head>
	<body>
		User: <form action='ViewUserPosts2.php' method='post'>";
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
			echo "<select name='combo'>";
			while($row = $result->fetch_assoc())
			{
				
				echo "<option value='".$row["author_id"]."'>".$row["author_id"]."</option>";
			}
			echo "</select>";
			$result->free();
			}
			$mysql->close();
			
		echo "<input type='submit'>
		</form>
	</body>
</html>";
?>

