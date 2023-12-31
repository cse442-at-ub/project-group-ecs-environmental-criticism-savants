<?php
//Below function has been sent to the shadow realm, it is only still around to easily display the format of the tasks database
//function CreateTaskDatabase($User, $conn) {
//    //$Query = $conn->prepare("CREATE TABLE ? (name TEXT, deadline TEXT, description TEXT, recurrence TEXT, priority TEXT)");
//    //$Query->execute([$User]);
//    $conn->query("CREATE TABLE tasks (user TEXT, name TEXT, deadline TEXT, description TEXT, recurrence TEXT, priority TEXT, late TEXT)");
//}

// function to retrieve every active task which a given user has created.
// return an array (indexed from 0 to (# of user tasks - 1) which contains
// arrays (indexed by the column names for tasks as defined in task database)
function retrieveTasks($User, $conn){
    $query = $conn->prepare("SELECT name, deadline, description, recurrence, priority, late FROM tasks WHERE user = ?");
    $query->execute([$User]);
    $endarray = [];
    foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $task){
        $endarray[] = $task;
    }
    return $endarray;
}

//Function will check if a task already exists within the database, used to ignore repeat calls
function DoesTaskNameExist($Username, $Taskname, $conn){
    $sql = $conn->prepare("SELECT * FROM tasks WHERE user = ? AND name = ?");
    $sql->execute([$Username, $Taskname]);
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

//When a user is trying to add a task, this function is used to insert their task into their task database
function addtask($User, $Taskname, $TaskDescription, $TaskDeadline, $Recurrence, $Priority, $conn) {
    if (!DoesTaskNameExist($User, $Taskname, $conn)) {
        $query = $conn->prepare("INSERT INTO tasks (user, name, deadline, description, recurrence, priority, late) VALUES (?, ?, ?, ?, ?, ?, 'no')");
        $query->execute([$User, $Taskname, $TaskDeadline, $TaskDescription, $Recurrence, $Priority]);
    }
}

// remove a user task, give the user who's tasks we are looking at and the name of the task they are trying to remove
function RemoveTask($User, $Taskname, $conn){
    //Find the task in the database
    //send it to the shadow realm
    $query = $conn->prepare("DELETE FROM tasks WHERE user = ? AND name = ?");
    $query->execute([$User, $Taskname]);
}

// function edit an existing task
// just re-use existing functions, don't see a reason to update values because runtime isn't a concern
// Call this function like you would the "addtask" function, but the new task information as the parameters instead of the old
// information
function EditTask($User, $Taskname, $TaskDescription, $TaskDeadline, $Recurrence, $Priority, $conn){
    //remove the task
    RemoveTask($User, $Taskname, $conn);
    //add the new task with new values
    addtask($User, $Taskname, $TaskDescription, $TaskDeadline, $Recurrence, $Priority, $conn);
}

?>
