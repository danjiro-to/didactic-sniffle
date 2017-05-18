<?php

require("common.php");
// Connection to db

$output = '';

if(isset($_POST['searchVal'])) {

    $searchq = $_POST['searchVal'];

    $query = "SELECT * FROM trill.search_test WHERE firstname LIKE '$searchq%' OR lastname LIKE '$searchq%'";

    $stmt = $db->prepare($query);
    // $stmt = $db->query("SELECT * FROM trill.search_test WHERE firstname LIKE '%$searchq%' OR lastname LIKE '%$searchq%'");
    $result = $stmt->execute();
    $count = $stmt->rowCount();

    if($count == 0) {
      $output = "Aww... Nothing found.";
    }
    else {

      while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $fname = $row['firstname'];
        $lname = $row['lastname'];

        $output .= '<div>'.$fname.' '.$lname.'</div>';

      }
   }

}

echo $output;
