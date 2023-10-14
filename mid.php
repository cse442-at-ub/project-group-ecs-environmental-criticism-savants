<?php
    $dom = new DOMDocument();
    $dom->loadHTMLFile("mid.html");

    $user = $_POST["username"];
    $passwd = $_POST["password"];
    $type = $_POST["here"];
    if ($type == "log") {
        //validation of username and password would go here, for when a user logs in
        $valid = strlen($passwd) >= 8;
        if($valid) {
            $node1 = $dom->getElementById("succ");
            $node2 = $dom->getElementById("next");
        }else{
            $node1 = $dom->getElementById("fail");
            $node2 = $dom->getElementById("back-l");
        }
        $node1->removeAttribute("hidden");
        $node2->removeAttribute("hidden");
    }
    //The else here handles requests from the sign up page;
    else{
        $repasswd = $_POST["repassword"];
        //Validation of sign up information should happen here
        $result = "";
        //if the username is already taken
        if($result== "taken"){
            $node1 = $dom->getElementById("taken");
            $node2 = $dom->getElementById("back-s");
        }
        // if the passwords do not match
        else if($result== "match"){
            $node1 = $dom->getElementById("match");
            $node2 = $dom->getElementById("back-s");
        }
        // if the password is too short
        else if($result== "short"){
            $node1 = $dom->getElementById("short");
            $node2 = $dom->getElementById("back-s");
        }
        // if there are spaces in the password/usernames
        else if($result == "spaces"){
            $node1 = $dom->getElementById("spaces");
            $node2 = $dom->getElementById("back-s");
        }
        // if the password is too long
        else if($result== "long"){
            $node1 = $dom->getElementById("long");
            $node2 = $dom->getElementById("back-s");
        }
        //If all the information is correct and the account was created
        else{
            $node1 = $dom->getElementById("done");
            $node2 = $dom->getElementById("next");
        }
        $node1->removeAttribute("hidden");
        $node2->removeAttribute("hidden");
    }
    echo $dom->saveHTML();

