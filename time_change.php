<?php

    $ar1 = array('name'=>'task 1','deadline'=>'2023-11-08','description'=>'stuff 1','recurrence'=>'once','priority'=>'one');
    $ar2 = array('name'=>'task 2','deadline'=>'2023-11-08','description'=>'stuff 1','recurrence'=>'once','priority'=>'two');

    if (isset($_POST['tasks'])) {
        // This is where you would call the retrieve data function
        $data = array('one'=>$ar1,'two'=>$ar2);
        $json = json_encode($data);
        echo $json;
    }