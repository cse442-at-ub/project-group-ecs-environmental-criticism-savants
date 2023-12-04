<?php

/* This function checks for tasks' recurrence option, and updates the deadline in the database accordingly.
    If the recurrence is only set to once, then the deadline is not updated. */

function updateDeadline($User, $tasks, $conn){
    $currentDate = new DateTime();
    $currentDateStr = $currentDate->format("Y-m-d");
    $monthlyInterval = new DateInterval('P1M');
    $weeklyInterval = new DateInterval('P1W');
    $yearlyInterval = new DateInterval('P1Y');
    foreach ($tasks as $task) {
        $deadline = $task["deadline"];
        $tempDeadline = new DateTime($deadline);
        while ($currentDateStr > $deadline) {
            if ($task['recurrence'] == "weekly") {
                $tempDeadline -> add($weeklyInterval);
                $deadline = $tempDeadline->format("Y-m-d");
            }
            else if ($task["recurrence"] == "monthly") {
                $tempDeadline -> add($monthlyInterval);
                $deadline = $tempDeadline->format("Y-m-d");
            }
            else if ($task["recurrence"] == "yearly") {
                $tempDeadline -> add($yearlyInterval);
                $deadline = $tempDeadline->format("Y-m-d");
            }
            else if ($task["recurrence"] == "once") {
                break;
            }
        }
        RemoveTask($User, $task["name"], $conn);
        addtask($User, $task["name"], $task["description"], $deadline, $task["recurrence"], $task["priority"], $conn);
    }
}
?>