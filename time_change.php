<?php
include 'UserTaskStorage.php';
include 'Credential-Template.php';
include 'DBConnection-Function.php';
include 'recurrence-updating.php';
/*
// The following are sample tasks for display testing purposes.
$ar1 = array('name'=>'Task 1','deadline'=>'2024-01-01','description'=>'Mildly Important Task','recurrence'=>'once','priority'=>'three');
$ar2 = array('name'=>'Task 2','deadline'=>'2024-01-01','description'=>'Very Important Task','recurrence'=>'once','priority'=>'six');
$ar3 = array('name'=>'Task 3','deadline'=>'2024-01-01','description'=>'Low Priority Task','recurrence'=>'once','priority'=>'one');
$ar4 = array('name'=>'Task 4','deadline'=>'2024-01-01','description'=>'High Priority Task','recurrence'=>'once','priority'=>'four');
*/

if (!isset($_SESSION['user_token'])){
    session_start();
}

$username = "";
if (isset($_SESSION['user_token']) && isset($_SESSION['user_username'])) {
    $username = $_SESSION['user_username']; // Retrieve the username from the session
}
if (isset($_POST['tasks'])) {
    $task = $_POST['tasks'];
    if (!empty($task)){
        $conn = get_database_connection(HOST, H_USERNAME, H_PASSWORD, DATABASE);
        RemoveTask($username, $task, $conn);
        $conn = null;
        $_POST['tasks'] = "";
    }

    // This is where you would call the retrieve data function
    $conn = get_database_connection(HOST, H_USERNAME, H_PASSWORD, DATABASE);
    $data = retrieveTasks($username, $conn);
    //updateDeadline($username, $data, $conn);
    $conn = null;
    $json = json_encode($data);
    echo $json;

    }
