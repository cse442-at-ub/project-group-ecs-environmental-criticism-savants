<?php
    $dom = new DOMDocument();
    $dom->loadHTMLFile("dashboard.html");
    // Should load users profile, and add name to the element id="user"

    echo $dom->saveHTML();