<?php
    $dom = new DOMDocument();
    $dom->loadHTMLFile("edit-tasks.html");
    session_start();


echo $dom->saveHTML();