<?php
//a function which will create the task database for a user which has just signed up
function CreateTaskDatabase($User, $conn) {
    //$Query = $conn->prepare("CREATE TABLE ? (name TEXT, deadline TEXT, description TEXT, recurrence TEXT, priority TEXT)");
    //$Query->execute([$User]);
    $conn->query("CREATE TABLE $User (name TEXT, deadline TEXT, description TEXT, recurrence TEXT, priority TEXT)");
}

// function to retrieve every active task which a given user has created.
// return an array (indexed from 0 to (# of user tasks - 1) which contains
// arrays (indexed by the column names for tasks as defined in task database)
function retrieveTasks($User, $task, $conn){
    $query = $conn->prepare("SELECT * FROM ?");
    $query->execute([$User]);
    $endarray = [];
    foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $task){
        $endarray[] = $task;
    }
    return $endarray;
}

//When a user is trying to add a task, this function is used to insert their task into their task database
function addtask($User, $Taskname, $TaskDescription, $TaskDeadline, $Recurrence, $Priority, $conn) {
    $query = $conn->prepare("INSERT INTO ? (name, deadline, description, recurrence, priority) VALUES (?, ?, ?, ?, ?)");
    $query->execute([$User, $Taskname, $TaskDescription, $TaskDeadline, $Recurrence, $Priority]);
}
?>