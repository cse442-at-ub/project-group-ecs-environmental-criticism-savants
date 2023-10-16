<?php
    $dom = new DOMDocument();
    $dom->loadHTMLFile("mid.html");


    // Use this function to connect to the database. It will return a variable which represents the connection itself,
    // which you should assign to a variable named $pdo. After you are done, ensure to immediately close the connection
    // by setting $pdo to null.
    function get_database_connection($host,$username,$password,$database_name) {
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$database_name", $username, $password);
            // Set the PDO error mode to exception
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Successful db connection"; // Sanity test to check that it connects
            return $pdo;
        } catch (PDOException $e) {
            die("Connection to ocean database failed: " . $e->getMessage());
        }
    }

// -----------------------------------------------------------------------------------------------------------------
    // This block is a section to test that your connection to the database you're looking for works. Feel free to
    // comment this out when you're done - Ray

    // Connect to database | Unless you're on a UB computer, you can only use the server given by XAMPP.
    $host = "127.0.0.1"; // e.g., localhost
    $h_username = "root";
    $h_password = "";
    $database = "users";

    $pdo = get_database_connection($host,$h_username,$h_password,$database);

// -----------------------------------------------------------------------------------------------------------------

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
        //if everything works properly
        if($result == "done"){
            $node2 = $dom->getElementById("next");
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

