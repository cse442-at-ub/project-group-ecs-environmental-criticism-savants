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
        if($result == "done"){
            $node2 = $dom->getElementById("next");
        }
        //If all the information is correct and the account was created
        else{
            $node2 = $dom->getElementById("back-s");
        }
        $node1 = $dom->getElementById($result);
        $node1->removeAttribute("hidden");
        $node2->removeAttribute("hidden");
    }
    echo $dom->saveHTML();

