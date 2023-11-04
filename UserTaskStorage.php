<?php
function CreateTaskDatabase($User, $conn) {
    $Query = $conn->prepare("CREATE TABLE ? (name TEXT, deadline TEXT, description TEXT, recurrence TEXT, priority TEXT)");
    $Query->execute([$User]);
}

function retrieveDeadline($User, $task, $conn){

}

function addtask($User, $Taskname, $TaskDescription, $TaskDeadline, $Recurrence, $Priority, $conn) {
    $query = $conn->prepare("INSERT INTO ? (name, deadline, description, recurrence, priority) VALUES (?, ?, ?, ?, ?)");
    $query->execute([$Taskname, $TaskDescription, $TaskDeadline, $Recurrence, $Priority])
}
?>