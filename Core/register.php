<?php

    require("common.php");
    // Connection to db

    if(!empty($_POST))
    {

        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {
            die("Invalid E-Mail Address");
        }

        $query = "SELECT 1 FROM users WHERE username = :username";


        $query_params = array(
            ':username' => $_POST['username']
        );
//
        try
        {

            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }
        catch(PDOException $ex)
        {

            die("Failed to run query: " . $ex->getMessage());
        }
//
//
        $row = $stmt->fetch();
//
//
        if($row)
        {
            die("This username is already in use");
        }
//
//         // Now we perform the same type of check for the email address, in order
//         // to ensure that it is unique.
        $query = "SELECT 1 FROM users WHERE email = :email";

        $query_params = array(
            ':email' => $_POST['email']
        );
//
        try
        {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }
        catch(PDOException $ex)
        {
            die("Failed to run query: " . $ex->getMessage());
        }
//
        $row = $stmt->fetch();

        if($row)
        {
            die("This email address is already registered");
        }
//
        $query = "INSERT INTO users (firstname, lastname, username, password, salt, email, friends) VALUES (:firstname, :lastname, :username, :password, :salt, :email, :friends)";

        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));


        $password = hash('sha256', $_POST['password'] . $salt);

        for($round = 0; $round < 65536; $round++)
        {
            $password = hash('sha256', $password . $salt);
        }

        $query_params = array(
            ':firstname' => $_POST['firstname'],
            ':lastname' => $_POST['lastname'],
            ':username' => $_POST['username'],
            ':password' => $password,
            ':salt' => $salt,
            ':email' => $_POST['email'],
            ':friends' => $_POST['username']
        );
//
        try
        {
            // Execute the query to create the user
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }
        catch(PDOException $ex)
        {

            die("Register failed");
        }

        header("Location: ../index.php");

        die("Redirecting to index.php");
    }


?>
