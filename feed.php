<?php
	require("Core/common.php");


	$query = "SELECT * FROM posts ORDER BY id DESC";

	 $stmt = $db->prepare($query);
	 $result = $stmt->execute();

?>

<!-- Connection to db -->

<html>

	<head>
		<meta charset="utf-8">
		<title> Trill </title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 		<link rel='stylesheet' type='text/css' href="Css/feed.css"/>
	</head>

	<body>

		<div class="navbar">
			<nav>
				<a href="feed.php"> Home </a>
				<a href="profile.php"> Profile </a>
				<a href="logout.php"> Logout </a>
				<a href="about.php"> About </a>
			</nav>
		</div>

		<div class="wrapper">

			<div class="newpost">
				<form action="Core/post.php" method="post">
					<textarea name="newPost" placeholder="Write about your day..."></textarea>
					<input type="submit" name="Post" value="Post">
				</form>
			</div>

			<div class="feed">
							<?php
								 while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
									 $username = $row['username'];
									 $message = $row['message'];
									 $id = $row['id'];

									//  $post = "<div class='post'><a name='profile' href='profile.php?u=$username'>".$username."</a>".$id.' '.$message."</div>";
									//  echo $post;

									echo "<div class='post'>";
									echo "<a name='profile' href='profile.php?u=$username'>".$username."</a>$id";
									echo " $message ";
									echo "<form><input type='text' placeholder='comment ...'>";
									echo "<input type='submit' value='post' name='$id' onclick='getName()'></form>";

									echo "</div>";

									 if(profile == true){
										 $_SESSION['profile'] = $username;
									 }
								 }
						 ?>
			</div>

		</div>
	</body>
</html>
