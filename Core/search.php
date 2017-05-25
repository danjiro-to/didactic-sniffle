<?php

require("common.php");
// Connection to db

$output = '';

if(isset($_POST['searchVal'])) {

    $searchq = $_POST['searchVal'];

    $query = "SELECT * FROM users WHERE firstname LIKE '$searchq%' OR lastname LIKE '$searchq%' OR username LIKE '$searchq' LIMIT 10";

    $stmt = $db->prepare($query);
    // $stmt = $db->query("SELECT * FROM trill.search_test WHERE firstname LIKE '%$searchq%' OR lastname LIKE '%$searchq%'");
    $result = $stmt->execute();
    $count = $stmt->rowCount();

    if($count == 0) {
      $output = "<li>No results</li>";
    }
    else {

      while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $username = $row['username'];
        $fname = $row['firstname'];
        $lname = $row['lastname'];

        $output .= "<li><a href='profile.php?u=$username'>".$fname.' '.$lname."</a></li>";

      }
   }

}



echo $output;
