<?php
// include "Credential-Template.php";
// include "DBConnection-Function.php";
include "ModifyDarkModeState.php";
include "time_change.php";

//if (!isset($_SESSION['user_token'])){
//    session_start();
//}

$dom = new DOMDocument();
$dom->loadHTMLFile("friends.html");

$username = "nothing";
if (isset($_SESSION['user_token']) && isset($_SESSION['user_username'])) {
   $username = $_SESSION['user_username']; // Retrieve the username from the session
}
$conn = get_database_connection(HOST, H_USERNAME, H_PASSWORD, DATABASE);
$currstate = retrievedarkmodestate($username, $conn);
    if($currstate==1){
        $node0 = $dom->getElementbyId("stylesheets");
        $node0->setAttribute('href',"friends-dark.css");
    }
    else{
        $node0 = $dom->getElementbyId("stylesheets");
        $node0->setAttribute('href',"friends.css");
    }


echo $dom->saveHTML();