<?php
include "time_change.php";
//if (!isset($_SESSION['user_token'])){
//    session_start();
//}

$dom = new DOMDocument();
$dom->loadHTMLFile("friends.html");

$username = "nothing";
//if (isset($_SESSION['user_token']) && isset($_SESSION['user_username'])) {
//    $username = $_SESSION['user_username']; // Retrieve the username from the session
//}


echo $dom->saveHTML();