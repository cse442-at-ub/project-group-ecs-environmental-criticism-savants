<?php
    include "PHP_Hashing.php";
    include "Credential-Template.php";
    include "DBConnection-Function.php";
    include "UserTaskStorage.php";
    include "pfpupdater.php";
    include "ModifyDarkModeState.php";

    $dom = new DOMDocument();
    $dom->loadHTMLFile("mid.html");

    $user = $_POST["username"];
    $passwd = $_POST["password"];
    $type = $_POST["here"];

    if ($type == "log") {
        //validation of username and password would go here, for when a user logs in
        $conn = get_database_connection(HOST, H_USERNAME, H_PASSWORD, DATABASE);
        $valid = VerifyExistingPassword($user, $passwd, $conn);
        $conn = null;
        if($valid) {
            session_start();
            $node1 = $dom->getElementById("succ");
            $node2 = $dom->getElementById("next");
            $_SESSION['user_token'] = bin2hex(random_bytes(16)); // Generate new random token
            $_SESSION['user_username'] = $user;
        }else{
            $node1 = $dom->getElementById("fail");
            $node2 = $dom->getElementById("back-l");
        }
        $node1->removeAttribute("hidden");
        $node2->removeAttribute("hidden");
    }
    //The else here handles requests from the sign-up page;
    else{
        $repasswd = $_POST["repassword"];
        //Validation of sign up information should happen here
        $conn = get_database_connection(HOST, H_USERNAME, H_PASSWORD, DATABASE);
        $result = CheckUsernameAndPassword($user, $passwd, $repasswd, $conn);
        $conn = null;
        //if everything works properly
        if($result == "done"){
            session_start();
            $_SESSION['user_token'] = bin2hex(random_bytes(16)); // Generate new random token
            $_SESSION['user_username'] = $user;
            $node2 = $dom->getElementById("next");
            $conn = get_database_connection(HOST, H_USERNAME, H_PASSWORD, DATABASE);
            StoreUserDataSignUp($user, $passwd, $conn);
            set_default_pic($user, $conn);// set default picture to userPFP.jpg
            set_default_theme($user, $conn); //set default theme as light
            $conn = null;
        }
        //If something goes wrong
        else{
            $node2 = $dom->getElementById("back-s");
        }
        $node1 = $dom->getElementById($result);
        $node1->removeAttribute("hidden");
        $node2->removeAttribute("hidden");
    }
    echo $dom->saveHTML();
?>
