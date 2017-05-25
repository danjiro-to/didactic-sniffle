<?php
require("common.php");

    if(!empty($_POST['writepost'])) {

      $query = "INSERT INTO posts (username, message) VALUES (:username, :messageq)";

       $query_params = array(
         ':username' => $_SESSION['user'],
         ':messageq' => $_POST['writepost']
       );

       try {
         $stmt = $db->prepare($query);
         $result = $stmt->execute($query_params);
       } catch (PDOException $e) {
          die("There was a problem while posting");
       }

      header("Location: ../feed.php");
    }
