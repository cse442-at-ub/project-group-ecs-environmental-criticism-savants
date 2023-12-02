<?php

function DoesFriendExist($Username, $friendname, $birthday, $conn)
{
    $sql = $conn->prepare("SELECT * FROM friends WHERE username = ? AND friendname = ? AND birthday = ?");
    $sql->execute([$Username, $friendname, $birthday]);
    //confirm that a username in the DB matches the entered one
    if ($sql->fetch() != False) {
        //if there is a match, return TRUE
        return True;
    }
    //else FALSE because no user of that name exists
    else {
        return False;
    }
}

function StoreFriend($username, $friendname, $birthday, $conn) {
    if (!DoesFriendExist($username, $friendname, $birthday, $conn)) {
        $request = $conn->prepare("INSERT INTO friends (username, friendname, birthday) VALUES (?,?,?)");
        $request->execute([$username, $friendname, $birthday]);
    }
}

function RemoveFriend($username, $friendname, $birthday,  $conn) {
    $request = $conn->prepare("DELETE FROM friends WHERE username = ? AND friendname = ? AND birthday = ?");
    $request->execute([$username, $friendname, $birthday]);
}

function RetrieveFriends($username, $conn){
    $query = $conn->prepare("SELECT username, friendname, birthday FROM friends WHERE username = ?");
    $query->execute([$username]);
    $endarray = [];
    foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $task){
        $endarray[] = $task;
    }
    return $endarray;
}

?>