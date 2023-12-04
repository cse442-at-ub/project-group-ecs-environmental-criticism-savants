<?php
include 'UserTaskStorage.php';
include 'Credential-Template.php';
include 'DBConnection-Function.php';
include 'recurrence-updating.php';


if (!isset($_SESSION['user_token'])){
    session_start();
}


// The following are sample tasks for display testing purposes.
$ar1 = array('name'=>'Task 1','deadline'=>'2024-01-01','description'=>'Mildly Important Task','recurrence'=>'once','priority'=>'three');
$ar2 = array('name'=>'Task 2','deadline'=>'2024-01-01','description'=>'Very Important Task','recurrence'=>'once','priority'=>'six');
$ar3 = array('name'=>'Task 3','deadline'=>'2024-01-01','description'=>'Low Priority Task','recurrence'=>'once','priority'=>'one');
$ar4 = array('name'=>'Task 4','deadline'=>'2024-01-01','description'=>'High Priority Task','recurrence'=>'once','priority'=>'four');


$username = "";
if (isset($_SESSION['user_token']) && isset($_SESSION['user_username'])) {
    $username = $_SESSION['user_username']; // Retrieve the username from the session
}

if (isset($_POST['occur'])) {
    $task = $_POST['occur'];
    if (!empty($task)){
        $conn = get_database_connection(HOST, H_USERNAME, H_PASSWORD, DATABASE);
        //increment deadline.
        incrementDeadline($username, $ar1, $conn);
        incrementDeadline($username, $ar2, $conn);
        incrementDeadline($username, $ar3, $conn);
        incrementDeadline($username, $ar4, $conn);
        $conn = null;
        $_POST['occur'] = "";
    }

    $json = json_encode("");
    echo $json;

}