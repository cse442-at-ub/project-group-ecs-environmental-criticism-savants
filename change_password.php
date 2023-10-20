<?php
    include "PHP_HASHING.php";
    include "Credential-Template.php";
    include "DBConnection-Function.php";

    $dom = new DOMDocument();
    $dom->loadHTMLFile("change_password.html");

    $currPass = $_POST["current_password"];
    $newPass = $_POST["new_password"];
    $reentered = $_POST["reenter_password"];

    echo $dom->saveHTML();
