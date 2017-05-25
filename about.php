<?php
	require('Core/common.php');
 ?>

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
				<a href="about.php" id="about"> About </a>
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

			<div class=feed>

			</div>
		</div>
	</body>
</html>
