<?php
    session_start();
    $dom = new DOMDocument();
    $dom->loadHTMLFile("settings_AccInfo.html");

    $username = "nothing";
    if(isset($_SESSION['user_token']) && isset($_SESSION['user_username'])) {
        $username = $_SESSION['user_username']; // Retrieve the username from the session
    }

    $node = $dom->getElementById("ai_user");
    $node->textContent = $username;
    echo $dom ->saveHTML();