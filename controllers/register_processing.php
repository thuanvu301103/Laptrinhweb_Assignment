<?php
    include_once ('../views/config.php');
    include_once('../models/Users.php');
    $newUser = new Users();
    $newUser->createConnection($servername, $username, $password, $dbname);
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['firstname'])&& isset($_POST['lastname'])) {
        $newUser->register($_POST);
    } else {
        header("Location: ./index.php/home");
        exit();
    }
    $newUser->connection->close();
?>
