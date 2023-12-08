<?php
include "UserTaskStorage.php";
include "DBConnection-Function.php";
include "Credential-Template.php";
include "deadline_checking.php";
include "ModifyDarkModeState.php";
session_start();
$username = "nothing";
if (isset($_SESSION['user_token']) && isset($_SESSION['user_username'])) {
    $username = $_SESSION['user_username']; // Retrieve the username from the session
}

$conn = get_database_connection(HOST, H_USERNAME, H_PASSWORD, DATABASE);
$taskname = $_POST["name"];
$taskdescription = $_POST["description"];
$taskdeadline = $_POST["deadline"];
$recurrence = $_POST["rec"];
$priority = $_POST["pri"];
addtask($username, $taskname, $taskdescription, $taskdeadline, $recurrence, $priority, $conn);
$dom = new DOMDocument();
$dom->loadHTMLFile("edit-tasks.html");
$currstate = retrievedarkmodestate($username, $conn);
    if($currstate==1){
        $node0 = $dom->getElementbyId("stylesheets");
        $node0->setAttribute('href',"edit-taskdark.css");
    }
    else{
        $node0 = $dom->getElementbyId("stylesheets");
        $node0->setAttribute('href',"edit-tasks.css");
    }

$conn = null;
// $dom = new DOMDocument();
// $dom->loadHTMLFile("edit-tasks.html");
echo $dom->saveHTML();
?>