<?php
include "FriendsToDatabase.php";
//include "DBConnection-Function.php";
//include "Credential-Template.php";
include "time_change.php";
include "ModifyDarkModeState.php";

//session_start();
$username = "nothing";
if (isset($_SESSION['user_token']) && isset($_SESSION['user_username'])) {
    $username = $_SESSION['user_username']; // Retrieve the username from the session
}
$dom = new DOMDocument();
$dom->loadHTMLFile("friends.html");
$conn = get_database_connection(HOST, H_USERNAME, H_PASSWORD, DATABASE);
$currstate = retrievedarkmodestate($username, $conn);
    if($currstate==1){
        $node0 = $dom->getElementById("stylesheets");
        $node0->setAttribute("href", "friends-dark.css");
    }
    else {
        $node0 = $dom->getElementById("stylesheets");
        $node0->setAttribute("href", "friends.css");
    }
$friendname = $_POST['full_name'];
$birthday = $_POST['date'];
$email = $_POST['email'];
StoreFriend($username, $friendname, $birthday, $email, $conn);
$conn = null;

echo $dom->saveHTML();
?>