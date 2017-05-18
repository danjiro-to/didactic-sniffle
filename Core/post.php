<?php
require("common.php");

    $name = array_values($_SESSION['user']);

    if(!empty($_POST['newPost'])) {

      $query = "INSERT INTO posts (username, message) VALUES (:username, :messageq)";

       $query_params = array(
         ':username' => $name[1],
         ':messageq' => $_POST['newPost']
       );

      $stmt = $db->prepare($query);
      $result = $stmt->execute($query_params);

      header("Location: ../feed.php");
    }
?>
