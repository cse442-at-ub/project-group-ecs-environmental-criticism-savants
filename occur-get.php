<?php
include 'UserTaskStorage.php';
include 'Credential-Template.php';
include 'DBConnection-Function.php';
include 'recurrence-updating.php';


if (!isset($_SESSION['user_token'])){
    session_start();
}

$username = "";
if (isset($_SESSION['user_token']) && isset($_SESSION['user_username'])) {
    $username = $_SESSION['user_username']; // Retrieve the username from the session
}
if (isset($_POST['occur'])) {
    $task = $_POST['occur'];
    if (!empty($task)){
        $conn = get_database_connection(HOST, H_USERNAME, H_PASSWORD, DATABASE);
        //increment deadline.
        incrementDeadline($username, $task, $conn);
        $conn = null;
        $_POST['occur'] = "";
    }

    $json = json_encode("");
    echo $json;

}