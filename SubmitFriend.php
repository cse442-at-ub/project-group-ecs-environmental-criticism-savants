<?php
include "FriendsToDatabase.php";
//include "DBConnection-Function.php";
//include "Credential-Template.php";
include "time_change.php";

//session_start();
$username = "nothing";
if (isset($_SESSION['user_token']) && isset($_SESSION['user_username'])) {
    $username = $_SESSION['user_username']; // Retrieve the username from the session
}

$conn = get_database_connection(HOST, H_USERNAME, H_PASSWORD, DATABASE);
$friendname = $_POST['full_name'];
$birthday = $_POST['date'];
$email = $_POST['email'];
StoreFriend($username, $friendname, $birthday, $email, $conn);
$conn = null;

$dom = new DOMDocument();
$dom->loadHTMLFile("friends.html");
echo $dom->saveHTML();
?>