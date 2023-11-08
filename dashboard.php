<?php
    include "time_change.php";
    session_start();
    $dom = new DOMDocument();
    $dom->loadHTMLFile("dashboard.html");
    // Should load username to the username variable below.
    // Check if the user is logged in (i.e., if a valid token and username exist in the session)
    $username = "nothing";
    if (isset($_SESSION['user_token']) && isset($_SESSION['user_username'])) {
        $username = $_SESSION['user_username']; // Retrieve the username from the session
    }

    $node = $dom->getElementbyId("user");
    $node->textContent = "Hello " . $username;
    $node2 = $dom->getElementbyId("left1");
    $node3 = $dom->getElementbyId("left2");
    $node2->textContent = "<";
    $node3->textContent = "<";



    if(isset($_POST["date_update"])){
        $date = time_update($_POST["date_update"],"","");
    }else{
        $date = new DateTime;
    }
    set($date->format('D d M Y'), $dom);

    echo $dom->saveHTML();

function set($time, $dom){
    $date = explode(" ", $time);
    $day = $dom->getElementbyId("day");
    $year = $dom->getElementbyId("year");
    $year->textContent= $date[3];
    $day->textContent = $date[0] . ", " . $date[1] . " " . $date[2];
}