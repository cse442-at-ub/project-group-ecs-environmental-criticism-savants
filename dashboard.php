<?php
    include "time_change.php";
    include "ModifyDarkModeState.php";

    if (!isset($_SESSION['user_token'])){
        session_start();
    }

    //call retrieve
    //call update
    $dom = new DOMDocument();
    $dom->loadHTMLFile("dashboard.html");
    // Should load username to the username variable below.
    // Check if the user is logged in (i.e., if a valid token and username exist in the session)
    $username = "nothing";
    if (isset($_SESSION['user_token']) && isset($_SESSION['user_username'])) {
        $username = $_SESSION['user_username']; // Retrieve the username from the session
    }
    $conn = get_database_connection(HOST, H_USERNAME, H_PASSWORD, DATABASE);
    $tasks = retrieveTasks($username, $conn);
    // updateDeadline($username, $tasks, $conn);
    $currstate = retrievedarkmodestate($username, $conn);

    if($currstate==1){
        $node0 = $dom->getElementbyId("stylesheets");
        $node0->setAttribute('href',"dash-dark.css");
    }
    else{
        $node0 = $dom->getElementbyId("stylesheets");
        $node0->setAttribute('href',"dash.css");
    }

    $node = $dom->getElementbyId("user");
    $node->textContent = "Hello " . $username;
    $node2 = $dom->getElementbyId("left1");
    $node3 = $dom->getElementbyId("left2");
    $node2->textContent = "<";
    $node3->textContent = "<";

    $node6 = $dom->getElementById("data-grab");
    $node6->textContent = $username;
    $conn = null;

    echo $dom->saveHTML();

?>