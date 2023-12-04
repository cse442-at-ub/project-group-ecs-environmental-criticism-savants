<?php
#1 is dark, 0 is light
function set_default_theme($username, $conn) {
    $query = $conn->prepare("INSERT INTO theme (user, preference) VALUES (?,?)");
    $query->execute([$username, 0]);
}

function retrievedarkmodestate($username, $conn){
    $query = $conn->prepare("SELECT user, preference FROM theme WHERE user = ?");
    $query->execute([$username]);
    $endarray = [];
    foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $task) {
        $endarray[] = $task;
    }
    return $endarray[0]['preference'];
}

function updatedarkmodestate($username, $state, $conn){
    $query = $conn->prepare("UPDATE theme SET preference = ? WHERE user = ?");
    $query->execute([$state, $username]);
}
?>