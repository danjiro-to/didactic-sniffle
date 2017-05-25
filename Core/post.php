<?php
require("common.php");

    if(!empty($_POST['writepost'])) {

      $query = "INSERT INTO posts (username, message, hashtag) VALUES (:username, :messageq, :hashtags)";

       $query_params = array(
         ':username' => $_SESSION['user'],
         ':messageq' => $_POST['writepost'],
         ':hashtags' => $_POST['hashtag']
       );

       try {
         $stmt = $db->prepare($query);
         $result = $stmt->execute($query_params);
       } catch (PDOException $e) {
          die("There was a problem while posting");
       }

      header("Location: ../feed.php");
    }
