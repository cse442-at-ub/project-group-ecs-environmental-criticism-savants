<?php
//Below function has been sent to the shadow realm, it is only still around to easily display the format of the tasks database
//function CreateTaskDatabase($User, $conn) {
//    //$Query = $conn->prepare("CREATE TABLE ? (name TEXT, deadline TEXT, description TEXT, recurrence TEXT, priority TEXT)");
//    //$Query->execute([$User]);
//    $conn->query("CREATE TABLE tasks (user TEXT, name TEXT, deadline TEXT, description TEXT, recurrence TEXT, priority TEXT)");
//}

// function to retrieve every active task which a given user has created.
// return an array (indexed from 0 to (# of user tasks - 1) which contains
// arrays (indexed by the column names for tasks as defined in task database)
function retrieveTasks($User, $conn){
    $query = $conn->prepare("SELECT name, deadline, description, recurrence, priority FROM tasks WHERE user = ?");
    $query->execute([$User]);
    $endarray = [];
    foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $task){
        $endarray[] = $task;
    }
    return $endarray;
}

//When a user is trying to add a task, this function is used to insert their task into their task database
function addtask($User, $Taskname, $TaskDescription, $TaskDeadline, $Recurrence, $Priority, $conn) {
    $query = $conn->prepare("INSERT INTO tasks (user, name, deadline, description, recurrence, priority) VALUES (?, ?, ?, ?, ?, ?)");
    $query->execute([$User, $Taskname, $TaskDeadline, $TaskDescription, $Recurrence, $Priority]);
}

?>