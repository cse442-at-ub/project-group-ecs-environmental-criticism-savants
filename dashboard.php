<?php
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
    $node->textContent = "Welcome back, " . $username;
    echo $dom->saveHTML();