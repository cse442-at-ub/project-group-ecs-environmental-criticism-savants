<?php
    include "time_change.php";
    session_start();
    $dom = new DOMDocument();
    $dom->loadHTMLFile("dashboard.html");
    // Should load username to the username variable below.
    // Check if the user is logged in (i.e., if a valid token and username exist in the session)
    $username = "nothing";
    if (isset($_SESSION['user_token']) && isset($_SESSION['user_username'])) {
        $username = $_SESSION['user_username']; // Retrieve the username from the session
    }

    $node = $dom->getElementbyId("user");
    $node->textContent = "Hello " . $username;
    $node2 = $dom->getElementbyId("left1");
    $node3 = $dom->getElementbyId("left2");
    $node2->textContent = "<";
    $node3->textContent = "<";

    $arr1 = "task_1,tomorrow,stuff-js,once,1 task_2,tomorrow,stuff-js,once,2";

    $node6 = $dom->getElementById("date-grab");
    $node6->textContent = $arr1;

    echo $dom->saveHTML();

