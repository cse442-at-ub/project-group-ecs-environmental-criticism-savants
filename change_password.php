<?php
    include "PHP_HASHING.php";
    include "DBConnection-Function.php";

    $currPass = $_POST["current_password"];
    $newPass = $_POST["new_password"];
    $reentered = $_POST["reentered_password"];
