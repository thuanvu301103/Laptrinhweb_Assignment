<?php
    include_once ('../views/config.php');
    include_once('../models/Users.php');
    session_start();
    $newUser = new Users();
    $newUser->createConnection($servername, $username, $password, $dbname);
    if (isset($_POST['username']) && isset($_POST['password'])&& isset($_POST['newPassword'])) {
        $newUser->editPassword($_POST);
        if($_SESSION['check']){
            $url = "../controllers/logout.php";
            header("Location: $url");
            exit();
        }
    } else {
        header("Location: ./index.php/home");
        exit();
    }
    $newUser->connection->close();
?>