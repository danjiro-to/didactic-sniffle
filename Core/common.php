<?php

    // Connection info for db
    $username = "root";
    $password = "root";
    $host = "localhost";
    $dbname = "trill";

    try
    {
        $db = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options);
    }
    catch(PDOException $ex)
    {
        die("There might be a raccoon in our code...");
    }

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    session_start();

    // No closing php tag for security
