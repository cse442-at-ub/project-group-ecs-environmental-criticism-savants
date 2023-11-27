<?php

function StoreFriend($username, $friendname, $birthday, $conn) {
    $request = $conn->prepare("INSERT INTO friends (username, friendname, birthday) VALUES (?,?,?)");
    $request->execute([$username,$friendname,$birthday]);
}

function RemoveFriend($username, $friendname, $birthday,  $conn) {
    $request = $conn->prepare("DELETE FROM friends WHERE username = ? AND friendname = ? AND birthday = ?");
    $request->execute([$username, $friendname, $birthday]);
}

RetrieveFriends($username, $conn){
    $query = $conn->prepare("SELECT username, friendname, birthday FROM friends WHERE username = ?");
    $query->execute([$User]);
    $endarray = [];
    foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $task){
        $endarray[] = $task;
    }
    return $endarray;
}

?>