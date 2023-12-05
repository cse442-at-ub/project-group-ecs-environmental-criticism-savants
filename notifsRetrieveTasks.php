<?php
include 'UserTaskStorage.php';
include 'Credential-Template.php';
include 'DBConnection-Function.php';

if(!isset($_SESSION['user_token'])){
    session_start();
}

$username = "";
if(isset($_SESSION['user_token']) && isset($_SESSION['user_username'])){
    $username = $_SESSION['user_username'];
}
if (isset($_POST['tasks'])) {
    $task = $_POST['tasks'];
    $conn = get_database_connection(HOST, H_USERNAME, H_PASSWORD, DATABASE);
    $data = retrieveTasks($username, $conn);
    $conn = null;
    $json = json_encode($data);
    echo $json;
}