<?php

function DoesFriendExist($Username, $friendname, $birthday, $email, $conn)
{
    $sql = $conn->prepare("SELECT * FROM friends WHERE username = ? AND full_name = ? AND date = ? AND email = ?");
    $sql->execute([$Username, $friendname, $birthday, $email]);
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

function StoreFriend($username, $friendname, $birthday, $email, $conn) {
    if (!DoesFriendExist($username, $friendname, $birthday, $email, $conn)) {
        $request = $conn->prepare("INSERT INTO friends (username, full_name, date, email) VALUES (?,?,?,?)");
        $request->execute([$username, $friendname, $birthday, $email]);
    }
}

function RemoveFriend($username, $friendname, $birthday, $email, $conn) {
    $request = $conn->prepare("DELETE FROM friends WHERE username = ? AND full_name = ? AND date = ? AND email = ?");
    $request->execute([$username, $friendname, $birthday, $email]);
}

function RetrieveFriends($username, $conn){
    $query = $conn->prepare("SELECT username, full_name, date, email FROM friends WHERE username = ?");
    $query->execute([$username]);
    $endarray = [];
    foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $task){
        $endarray[] = $task;
    }
    return $endarray;
}

?>