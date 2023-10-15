<?php
    $dom = new DOMDocument();
    $dom->loadHTMLFile("dashboard.html");
    // Should load username to the username variable below.
    $username = "Joe";
    
    $node = $dom->getElementbyId("user");
    $node->textContent = "Welcome back " . $username;
    echo $dom->saveHTML();