<?php
    $ar1 = array('name'=>'task 1','deadline'=>'2023-11-08','description'=>'stuff 1','recurrence'=>'once','priority'=>'two');
    $ar2 = array('name'=>'task 2','deadline'=>'2023-11-08','description'=>'stuff 1','recurrence'=>'once','priority'=>'one');
    $ar3 = array('name'=>'task 3','deadline'=>'2023-11-08','description'=>'stuff 1','recurrence'=>'once','priority'=>'four');
    $ar4 = array('name'=>'task 4','deadline'=>'2023-11-08','description'=>'stuff 1','recurrence'=>'once','priority'=>'six');
    if (isset($_POST['tasks'])) {
        // This is where you would call the retrieve data function
        $data = array('one'=>$ar1,'two'=>$ar2, 'three'=>$ar3, 'four'=>$ar4);
        $json = json_encode($data);
        echo $json;
    }