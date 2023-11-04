<?php
function CreateTaskDatabase($User, $conn) {
    $Query = $conn->prepare("CREATE TABLE ? (name TEXT, deadline TEXT, description TEXT, recurrence TEXT, priority TEXT)");
    $Query->execute([$User]);
}

// return
function retrieveTasks($User, $task, $conn){
    $query = $conn->prepare("SELECT * FROM ?");
    $query->execute([$User]);
    $endarray = [];
    foreach ($query->fetchAll() as $task){
        $endarray[] = $task;
    }
    return $endarray;
}

function addtask($User, $Taskname, $TaskDescription, $TaskDeadline, $Recurrence, $Priority, $conn) {
    $query = $conn->prepare("INSERT INTO ? (name, deadline, description, recurrence, priority) VALUES (?, ?, ?, ?, ?)");
    $query->execute([$User, $Taskname, $TaskDescription, $TaskDeadline, $Recurrence, $Priority]);
}
?>