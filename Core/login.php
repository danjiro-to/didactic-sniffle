<?php

 require("common.php");
 // Connection to db

if(!empty($_POST)) {

    $login_ok = false;

    $query = "SELECT id, username, password, salt, email FROM users WHERE username = :username";
    $query_params = array(':username' => $_POST['username']);

    try
    {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex)
    {
        die("There might a raccoon in the code...");
    }

    $row = $stmt->fetch();

    if($row)
    {
        $check_password = hash('sha256', $_POST['password'] . $row['salt']);
        for($round = 0; $round < 65536; $round++)
        {
            $check_password = hash('sha256', $check_password . $row['salt']);
        }

        if($check_password == $row['password'])
        {
            $login_ok = true;
        }
    }

    if($login_ok)
    {

        unset($row['salt']);
        unset($row['password']);


        $_SESSION['user'] = $row;


        header("Location: ../feed.php");
        die("Redirecting to: feed.php");
    }
    else
    {
        $failed ="Login Failed.";

    }
}

?>
