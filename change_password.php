<?php
    include "Credential-Template.php";
    include "DBConnection-Function.php";
    include "Settings-Functions.php";

    $dom = new DOMDocument();
    $dom->loadHTMLFile("change_password.html");
    //change this to a username you want to test
    // later try linking $user to a token linking the currently signed in user.
    $user = "iD_0m";
    $currPass = $_POST["current_password"];
    $newPass = $_POST["new_password"];
    $reentered = $_POST["reenter_password"];

    $conn = get_database_connection(HOST, H_USERNAME, H_PASSWORD, DATABASE);
    $result = CreateChangePasswordFlag($user, $currPass, $newPass, $reentered, $conn);
    $conn = null;
    // if it works properly unhide "successfully changed pass popup"
    if($result == "done"){
        $conn = get_database_connection(HOST, H_USERNAME, H_PASSWORD, DATABASE);
        StoreNewPassword($user, $newPass, $conn);
        $conn = null;
    }
    $node1 = $dom->getElementById($result);
    $node1->removeAttribute("hidden");

    echo $dom->saveHTML();
