<?php
    include_once ('../views/config.php');
    include_once('../models/Users.php');
    session_start();
    $newUser = new Users();
    $newUser->createConnection($servername, $username, $password, $dbname);
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $checker = $newUser->login($_POST);
        if ($checker){
        }
    } else {
        header("Location: ../index.php/login");
        exit();
    }
    $newUser->connection->close();
?>