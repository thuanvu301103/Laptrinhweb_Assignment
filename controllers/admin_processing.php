<?php
include_once('../views/config.php');
include_once('../models/Users.php');

if ($_POST['action'] == "Remove") {
    $user = new Users();
    $user->createConnection($servername, $username, $password, $dbname);
    $user->removeStaff($_POST['userID']);
    $user = $_POST['adminID'];
    $url = "../index.php/admin?userid=$user";
    header("Location:" . $url);

}
elseif ($_POST['action'] == "New staff") {
    $user = new Users();
    $user->createConnection($servername, $username, $password, $dbname);
    $user->addStaff();
    $user = $_POST['adminID'];
    $url = "../index.php/admin?userid=$user";
    header("Location:" . $url);
}
?>