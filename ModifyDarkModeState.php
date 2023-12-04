<?php
#1 is dark, 0 is light
function AddDefaultDarkMode($username, $conn) {
    $query = $conn->prepare("INSERT INTO darkmode (user, state) VALUES (?,?)");
    $query->execute([$username, 0]);
}

function retrievedarkmodestate($username, $conn){
    $query = $conn->prepare("SELECT user, state FROM darkmode WHERE user = ?");
    $query->execute([$username]);
    $endarray = [];
    foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $task) {
        $endarray[] = $task;
    }
    return $endarray;
}

function updatedarkmodestate($username, $state, $conn){
    $query = $conn->prepare("UPDATE darkmode SET state = ? WHERE user = ?");
    $query->execute([$state, $username]);
}
?>