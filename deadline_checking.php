<?php

// This function takes a task, and compares today's date with the deadline of that task.
// (For front-end clowns): When retrieving a task to display on the dashboard, use this function to
// determine whether to mark the task late or not on the UI. Returns a boolean (True if it is late, false
// otherwise). Basically a helper function for the second below.

function isLate($task)
{
    $currentDate = date("Y-m-d");
    $deadline = $task["deadline"];
    if ($currentDate > $deadline) {
        return True;
    } else {
        return False;
    }
}

// This is an iterative version of the above function that checks every task for a user to see if it's
// late. It returns an array of all tasks that are currently late.

function allLateTasks($tasks)
{
        $late_tasks = [];
        foreach ($tasks as $task) {
            if (isLate($task)) {
                $late_tasks[] = $task;
            }
        }
        return $late_tasks;
}

// Use either of these functions for implementing the displaying of the tasks, and revolve your logic
// around it. Good luck beta front-ends.