<?php
    include "time_change.php";
    include "ModifyDarkModeState.php";
    
    if (!isset($_SESSION['user_token'])){
        session_start();
    }
    $conn = get_database_connection(HOST, H_USERNAME, H_PASSWORD, DATABASE);

    $dom = new DOMDocument();
    $dom->loadHTMLFile("settings_AccInfo.html");
    // Should load username to the username variable below.
    // Check if the user is logged in (i.e., if a valid token and username exist in the session)
    $username = "nothing";
    if (isset($_SESSION['user_token']) && isset($_SESSION['user_username'])) {
        $username = $_SESSION['user_username']; // Retrieve the username from the session
    }
    $currstate = retrievedarkmodestate($username, $conn);
    if($currstate==0){
        updatedarkmodestate($username, 1, $conn);
    }
    else{
        updatedarkmodestate($username, 0, $conn);
    }
    
    header("Location: settings_AccInfo.php");
    die();

?>