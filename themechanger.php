<?php

//Function called by mid.php to set default picture for new user
function set_default_theme($username, $conn){
    $query= $conn->prepare("INSERT INTO theme VALUES (?, ?)");
    $theme = 0; //set default theme as light

    $query->execute([$username,$theme]);
}

function change_theme($username, $conn){
    $newtheme = $conn->query("SELECT preference FROM theme WHERE user='$username';");
    if($oldtheme==0){
        $conn->query("UPDATE theme SET preference=1 WHERE user='$username'");
    }
    else{
        $conn->query("UPDATE theme SET preference=0 WHERE user='$username'");
    }

}

function get_theme($username, $conn){

}
?>