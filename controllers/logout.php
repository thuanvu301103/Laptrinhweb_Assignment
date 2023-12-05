<?php
include "function.php"; 
session_start();

session_unset();
session_destroy();

//! Must be edited to redirect to the correct page
header("Location: ../index.php/home");
?>