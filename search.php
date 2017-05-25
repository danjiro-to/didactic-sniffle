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
      $output = "<li> No result </li>";
    }
    else {

      while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $username = $row['username'];
        $fname = $row['firstname'];
        $lname = $row['lastname'];

        $output .= "<li><a href='profile.php?u=$username'>".$fname.' '.$lname."</a></li>";

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
 		<link rel='stylesheet' type='text/css' href="Css/search.css"/>
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

 			</div>

  <div class="results">
    <ul class="output">
      <?php echo $output ?>
    </ul>
  </div>

    </div>
  </body>
</html>
