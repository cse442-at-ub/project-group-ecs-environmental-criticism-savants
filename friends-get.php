<?php

include 'Credential-Template.php';
include 'DBConnection-Function.php';
include "FriendsToDatabase.php";

if (!isset($_SESSION['user_token'])){
    session_start();
}

$arr1 = array("full_name"=>"Daniel Preisler","date"=>"2003-03-18","email"=>"emails");
$arr2 = array("full_name"=>"Jack Preisler","date"=>"2006-12-27","email"=>"emails");

$username = "";
if (isset($_SESSION['user_token']) && isset($_SESSION['user_username'])) {
    $username = $_SESSION['user_username']; // Retrieve the username from the session
}
if (isset($_POST['friends'])) {
    $friends = $_POST['friends'];
    if (!empty($friends)){
        $conn = get_database_connection(HOST, H_USERNAME, H_PASSWORD, DATABASE);
        //Remove function goes here
        RemoveFriend($username, $friends, $birthday, $conn);
        $conn = null;
        $_POST['friends'] = "";
    }

    // This is where you would call the retrieve data function
    $conn = get_database_connection(HOST, H_USERNAME, H_PASSWORD, DATABASE);
    $data = RetrieveFriends($username, $conn);
    $data = array("one"=>$arr1,"two"=>$arr2);
    $conn = null;
    $json = json_encode($data);
    echo $json;

}
