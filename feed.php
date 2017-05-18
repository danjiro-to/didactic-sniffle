<?php
	require("Core/common.php");

	$name = array_values($_SESSION['user']);

?>
<html>

	<head>
		<meta charset="utf-8">
		<title> Trill </title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 		<link rel='stylesheet' type='text/css' href="Css/feed.css"/>
	</head>

	<body>
	<div class="navbar">
		<a href="feed.php" class="home"> Home </a>
		<a href='profile.php?u=<?php echo $name[1]?>' class="prof"> <?php echo $name[1]; ?> </a>
		<a href='Core/logout.php' class="logout"> Log Out </a>
		<div class="searchBar">
		<form action="search.php" method="get">
			<input type="text" name="search" placeholder="Search..." autocomplete="off">
			<input type="submit" value=">>">
		</form>
		</div>
	</div>

	<div class="empty">
		<div class="emptyy">
		<form action="Core/post.php" method="post">
			<!-- <input type="file" name="image"> -->
			<textarea name="newPost" placeholder="Write about your day..."></textarea>
			<input type="submit" name="Post" value="Post">
		</form>
	</div>
	</div>

	<div class="feed">
			<?php

			$query = "SELECT * FROM posts ORDER BY id DESC";

			 $stmt = $db->prepare($query);
			 $result = $stmt->execute();

			 while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				 $username = $row['username'];
				 $message = $row['message'];

				 $post = "<div class='post'><a name='profile' href='profile.php?u=$username'>".$username."</a>".$message."</div>";
				 echo $post;

				 if(profile == true){
					 $_SESSION['profile'] = $username;
				 }
			 }


		 ?>
		</div>

		</body>
</html>
