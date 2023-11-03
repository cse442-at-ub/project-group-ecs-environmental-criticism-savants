<?php
use MongoDB\Driver\Query;
function CreateTaskDatabase($User, $conn) {
    $Query = $conn->prepare("CREATE TABLE ? (name TEXT, deadline TEXT, description TEXT, recurrence TEXT, priority TEXT)");
    $Query->execute([$User]);
}

function retrieveDeadline($User, $task, $conn){

}

function addtask($User, $Taskname, $TaskDescription, $TaskDeadline, $conn) {

}
?>