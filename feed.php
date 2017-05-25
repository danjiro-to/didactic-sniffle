<?php
	require("Core/common.php");
?>

<!-- Connection to db -->

<html>

	<head>
		<meta charset="utf-8">
		<title> Trill </title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script type="text/javascript" src="Js/search.js"></script>
		<link rel='stylesheet' type='text/css' href="Css/feed.css"/>
	</head>

	<body>

		<div class="navbar">
			<nav>
				<a href="feed.php" id="home"> Home </a>
				<a href="profile.php?u=<?php echo $_SESSION['user'] ?>" id="profile"> <?php echo $_SESSION['user'] ?></a>
				<a href="About.html" id="about"> About </a>
				<a href="Core/logout.php" id="logout"> Logout </a>
			</nav>
		</div>

		<div class="wrapper">

			<div class="searchbar">
				<form action="search.php" method="get">
					<input type="text" name="search" placeholder="Search..." autocomplete="off" onkeyup="searchq()">
					<input type="submit" value="Search">
				</form>
				<ul class="output">
				</ul>
			</div>

			<div class="newpost">
				<div class="titlepost">
					Create a new post
				</div>
				<form action="Core/post.php" method="post">
					<textarea name="writepost" class="writepost" placeholder="Write about your day..."></textarea>
					<input type="text" name="hashtags" class="writehashtag" placeholder="Write a Hashtag...">
					<input type="submit" name="postpost" class="postpost" value="Post">
				</form>
			</div>

			<div class="feed">
							<?php
								$query = "SELECT friends FROM users WHERE username = :username";
								$query_params = array(':username' => $_SESSION['user']);

								$stmt = $db->prepare($query);
							 	$result = $stmt->execute($query_params);
								$row = $stmt->fetch(PDO::FETCH_ASSOC);
								$friendArray = $row['friends'];

								$query = "SELECT * FROM posts WHERE username IN ($friendArray) ORDER BY id DESC";

								$stmt = $db->prepare($query);
 							  $result = $stmt->execute();


								 while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
									 $username = $row['username'];
									//  $fname = $row['firstname'];
									//  $lname = $row['lastname'];
									 $message = $row['message'];
									 $hashtag = $row['hashtag'];


									echo "<div class='post'>";
									echo "<div class='postDetails'><a class='profilelink' href='profile.php?u=$username'>".$username." </a> ".$hashtag."</div>";
									echo "<div class='postContent'> $message </div>";
									echo "</div>";

								 }
						 ?>
			</div>

		</div>

	</body>
</html>
