<?php echo "<html>
	<head>
		<title>Delete Posts</title>
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
			$delete = $_POST["delete"];
			if(sizeof($delete) == 0)
			{
				printf("No posts to delete");
				exit();
			}
			$query = "DELETE FROM Posts WHERE";
			for($i =0; $i <sizeof($delete); $i++){
				$query .= " post_id = '$delete[$i]'";
				if($i < sizeof($delete) - 1)
					$query .= " OR";
			}
			if($mysql->query($query)){
				echo"The posts have been successfully deleted.";
			}
			else{
			echo "$query The posts could not be deleted";
			}
			$mysql->close();
	echo"</body>
</html>";
?>

