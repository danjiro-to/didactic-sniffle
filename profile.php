<?php
  require("Core/common.php");

  $profile = $_GET['u'];
 ?>
<html>
<head>
  <meta charset="utf-8">
  <title> Trill </title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel='stylesheet' type='text/css' href="Css/profile.css"/>
</head>

<body>

<div class="navbar">
  <a href="feed.php" class="home"> Home </a>
  <a href='profile.php?u=<?php echo $profile?>' class="prof"> <?php echo $profile; ?> </a>
  <a href='Core/logout.php' class="logout"> Log Out </a>
  <div class="searchBar">
  <form action="search.php" method="get">
    <input type="text" name="search" placeholder="Search..." autocomplete="off">
    <input type="submit" value=">>">
  </form>
  </div>
</div>

  <div class="profile">
    <div class="info">
      <?php

      $query = "SELECT * FROM users WHERE username = :username ORDER BY id DESC";

      $query_params = array(
        ':username' => $profile,
      );
       $stmt = $db->prepare($query);
       $result = $stmt->execute($query_params);

       while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
         $username = $row['username'];
         $fname = $row['firstname'];
         $lname = $row['lname'];
         $email = $row['email'];

         $info = "<div class='details'><h1><a name='profile' href='profile.php?u=$username'>".$username."</a></h1>".$fname.'</br></br>'.$lname.'</br></br>'.$email."</div>";
         echo $info;
    }
     ?>
    </div>
  </div>

  <div class="posts">
    <?php

    $query = "SELECT * FROM posts WHERE username = :username ORDER BY id DESC";

    $query_params = array(
      ':username' => $profile,
    );
     $stmt = $db->prepare($query);
     $result = $stmt->execute($query_params);

     while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
       $username = $row['username'];
       $message = $row['message'];

       $post = "<div class='post'><h1><a name='profile' href='profile.php?u=$username'>".$username."</a></h1>".$message."</div>";
       echo $post;
  }
   ?>

 </div>

</div>
</html>
