<?php
    include_once ('../views/config.php');
    include_once('../models/Users.php');
    session_start();
    $newUser = new Users();
    $newUser->createConnection($servername, $username, $password, $dbname);
    if (isset($_POST['username']) && isset($_POST['firstname'])&& isset($_POST['lastname'])) {
        $newUser->editProfile($_POST);
        
    } else {
        header("Location: ./index.php/home");
        exit();
    }
    $newUser->connection->close();
?>