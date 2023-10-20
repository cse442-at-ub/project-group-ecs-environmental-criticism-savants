<?php
    session_start();
    include "Credential-Template.php";
    include "DBConnection-Function.php";
    include "Settings-Functions.php";
    // Retrieve token data
    $username = "nothing";
    if (isset($_SESSION['user_token']) && isset($_SESSION['user_username'])) {
        $username = $_SESSION['user_username']; // Retrieve the username from the session
    }
    $dom = new DOMDocument();
    $dom->loadHTMLFile("change_password.html");
    //change this to a username you want to test
    // later try linking $user to a token linking the currently signed in user.
    $currPass = $_POST["current_password"];
    $newPass = $_POST["new_password"];
    $reentered = $_POST["reenter_password"];

    $conn = get_database_connection(HOST, H_USERNAME, H_PASSWORD, DATABASE);
    $result = CreateChangePasswordFlag($username, $currPass, $newPass, $reentered, $conn);
    $conn = null;
    // if it works properly unhide "successfully changed pass popup"
    if($result == "done"){
        $conn = get_database_connection(HOST, H_USERNAME, H_PASSWORD, DATABASE);
        StoreNewPassword($username, $newPass, $conn);
        $conn = null;
    }
    $node1 = $dom->getElementById($result);
    $node1->removeAttribute("hidden");

    echo $dom->saveHTML();
