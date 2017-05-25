<?php
	require("Core/common.php");

//   $userpage = $_GET['u'];
//
//    $friendsArray= "";
//    $countFriends= "";
//    $friendsArray12= "";
//    $addAsFriend="";
//
//    $selectFriendsQuery = mysqli_query($connection, "SELECT friends From users where username='$userpage'");
//    $friendRow= mysqli_fetch_assoc($selectFriendsQuery);
//    $friendArray=$friendRow['friends'];
//    if($friendArray != ""){
//
//   $friendArray = explode(",",$friendArray);
//   $countFriends = count($friendArray);
//   $friendsArray12 = array_slice($friendArray, 0,12);
// }

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
				<a href="profile.php/?u=<?php echo $_SESSION['user'] ?>" id="profile"> <?php echo $_SESSION['user'] ?></a>
				<div class="searchbar">
					<form action="search.php" method="get">
						<input type="text" name="search" placeholder="Search..." autocomplete="off" onkeyup="searchq()">
						<input type="submit" value="Search">
					</form>
					<ul class="output">
					</ul>
				</div>
				<a href="about.php" id="about"> About </a>
				<a href="logout.php" id="logout"> Logout </a>
			</nav>
		</div>

		<div class="wrapper">

			<div class="profile">
				<div class="userprofile">
					<?php echo $_GET['u'];

            //     if($_GET['u'] != $_SESSION['user']){
            //
            //  echo "<form method='post' action='user.php?u=$userpage";
            //
            //
            //  $i=0;
            //  if (in_array($arr[1], $friendArray)){
            //   $addAsFriend = '<input class = "addfriend" type="submit" name="removefriend" value= "Remove friend">';
            //  }else{
            //   $addAsFriend = '<input class = "addfriend" type="submit" name="addfriend" value= "Add Friend">';
            //  }
            //    echo" <span>";
            //  echo $addAsFriend;
            //   echo"<span>";
            //   echo"</form>";
            //
            //
            //
            // }else{
            //
            // }


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
                // $fname = $row['firstname'];
                // $lname = $row['lastname'];
                $message = $row['message'];

               echo $username;
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


									//  $post = "<div class='post'><a name='profile' href='profile.php?u=$username'>".$username."</a>".$id.' '.$message."</div>";
									//  echo $post;

									echo "<div class='post'>";
									echo "<div class='postDetails'><a class='profilelink' href='profile.php?u=$username'>".$username." </a></div>";
									echo "<div class='postContent'> $message </div>";
									echo "<form><input type='text' placeholder='comment ...'>";
									echo "<input type='submit' value='post'></form>";
									echo "</div>";


								 }
						 ?>
			</div>

		</div>

	</body>
</html>
