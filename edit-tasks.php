<?php
    $dom = new DOMDocument();
    $dom->loadHTMLFile("edit-tasks.html");
echo $dom->saveHTML();