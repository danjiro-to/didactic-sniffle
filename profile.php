<?php
	require("Core/common.php");

  $userpage = $_GET['u'];
	$following = FALSE;

?>

<!-- Connection to db -->

<html>

	<head>
		<meta charset="utf-8">
		<title> Trill </title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script type="text/javascript" src="Js/search.js"></script>
		<link rel='stylesheet' type='text/css' href="Css/profile.css"/>
	</head>

	<body>

		<div class="navbar">
			<nav>
				<a href="feed.php" id="home"> Home </a>
				<a href="profile.php?u=<?php echo $_SESSION['user']; ?>" id="profile"> <?php echo $_SESSION['user']; ?></a>
				<a href="https://github.com/gem3141/Trill/wiki" id="about"> About </a>
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

			<div class="profile">
				<div class="userprofile">
					<?php

					 		$query = "SELECT * FROM users WHERE username = :username";
							$query_params = array(':username' => $_GET['u'] );

							$stmt = $db->prepare($query);
              $result = $stmt->execute($query_params);

							while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $fname = $row['firstname'];
                $lname = $row['lastname'];

								echo "".$fname.' '.$lname."";
							}

							$query = "SELECT friends FROM users WHERE username = :username";
							$query_params = array(':username' => $_SESSION['user']);

							$stmt = $db->prepare($query);
							$result = $stmt->execute($query_params);
							$row = $stmt->fetch(PDO::FETCH_ASSOC);
							$friendArray = $row['friends'];
							if($friendArray != '') {
								$friendArray = explode("," ,$friendArray);
							}

							for($i=0;$i<count($friendArray); $i++){
								 if($friendArray[$i] == "'".$userpage."'"){
								//	 $following = TRUE;
								$following = TRUE;
								echo "  </br>(Following)";
								 }
							}

							if($userpage != $_SESSION['user']) {
								if($following == FALSE){

									echo "<form action='profile.php?u=$userpage' method='post'><input name='follow' type='submit' value='follow'></form>";

								}
							}

							if(isset($_POST['follow'])){

								$query = "UPDATE users SET friends=Concat(friends, :user) WHERE username = :username";
								$query_params = array(':user' => ",'".$userpage."'", ':username' => $_SESSION['user']);

								$stmt = $db->prepare($query);
	              $result = $stmt->execute($query_params);

								 echo '<meta http-equiv="refresh" content="0">';

							}
          ?>
				</div>
        <div class="infoprofile">
          <?php
              $query = "SELECT * FROM users WHERE username = :username ORDER BY id DESC";

              $query_params = array(':username' => $_GET['u']);

              $stmt = $db->prepare($query);
              $result = $stmt->execute($query_params);

              while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $username = $row['username'];
                $fname = $row['firstname'];
                $lname = $row['lastname'];
                $message = $row['message'];
								$email = $row['email'];


               echo "<p>Username: $username</p>";
							 echo "<p>Email: $email</p>";
              }


          ?>
        </div>
			</div>

			<div class="feed">
							<?php
								 $query = "SELECT * FROM posts WHERE username = :username ORDER BY id DESC";

                 $query_params = array(':username' => $_GET['u']);

								 $stmt = $db->prepare($query);
								 $result = $stmt->execute($query_params);

								 while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
									 $username = $row['username'];
									 $fname = $row['firstname'];
									 $lname = $row['lastname'];
									 $message = $row['message'];
									 $hashtag = $row['hashtag'];


									//  $post = "<div class='post'><a name='profile' href='profile.php?u=$username'>".$username."</a>".$id.' '.$message."</div>";
									//  echo $post;

									echo "<div class='post'>";
									echo "<div class='postDetails'><a class='profilelink' href='profile.php?u=$username'>".$username.' '.$hashtag." </a></div>";
									echo "<div class='postContent'> $message </div>";
									echo "</div>";


								 }
						 ?>
			</div>

		</div>

	</body>
</html>
