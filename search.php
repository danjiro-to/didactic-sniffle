<?php

require("Core/common.php");
// Connection to db

$name = array_values($_SESSION['user']);

$output = '';

if(!empty($_GET['search'])) {

    $searchq = $_GET['search'];

    $query = "SELECT * FROM users WHERE username LIKE '$searchq%' OR firstname LIKE '$searchq%' OR lastname LIKE '$searchq%'";

    $stmt = $db->prepare($query);
    $result = $stmt->execute();
    $count = $stmt->rowCount();

    if($count == 0) {
      $output = "<div class='unknown'> No result. </div>";
    }
    else {

      while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $username = $row['username'];
        $fname = $row['firstname'];
        $lname = $row['lastname'];

        $output .= "<div class='result'><a href='profile.php?u=$username'>".$fname.' '.$lname."</a></div>";

      }
   }

} else {
  header("Location: feed.php");
}

?>

<html>

	<head>
		<meta charset="utf-8">
		<title> Trill </title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script type="text/javascript" src="Js/search.js"></script>
		<script type="text/javascript" src="Js/post.js"></script>
 		<link rel='stylesheet' type='text/css' href="Css/search.css"/>
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
    </div>
		</form>
	</div>

  <div class="searchRes">
      <?php echo $output; ?>
  </div>

  </body>
</html>
