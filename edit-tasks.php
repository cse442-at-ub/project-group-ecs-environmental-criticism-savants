<?php
include "ModifyDarkModeState.php";
include "Credential-Template.php";
include "DBConnection-Function.php";
    $dom = new DOMDocument();
    $dom->loadHTMLFile("edit-tasks.html");
    session_start();
    $conn = get_database_connection(HOST, H_USERNAME, H_PASSWORD, DATABASE);
    $username = "nothing";
    if (isset($_SESSION['user_token']) && isset($_SESSION['user_username'])) {
        $username = $_SESSION['user_username']; // Retrieve the username from the session
    }
    $currstate = retrievedarkmodestate($username, $conn);
    if($currstate==1){
        $node0 = $dom->getElementbyId("stylesheets");
        $node0->setAttribute('href',"edit-taskdark.css");
    }
    else{
        $node0 = $dom->getElementbyId("stylesheets");
        $node0->setAttribute('href',"edit-tasks.css");
    }


echo $dom->saveHTML();