<?php echo "<html>
	<head>
		<title>View User Posts</title>
	</head>
	<body>";
			#establish connections
			$mysql = new mysqli("mysql.eecs.ku.edu","glopez", 'P@$$word123', "glopez");
			#check connection
			if($mysql->connect_errno) 
			{
				printf('Connect failed to mysql.');
				exit();
			} 
			$user = $_POST["combo"];
			if($result = $mysql->query("SELECT * FROM Posts WHERE author_id = '$user'"))
			{
				echo "<table>";
				echo "<tr><th>$user<th><tr>";
			while($row = $result->fetch_assoc())
			{
				echo "<tr><td>".$row["content"]."</td></tr>";
			}
			echo "</table>";
			$result->free();
			}
			$mysql->close();
echo "</body>
</html>";
?>

