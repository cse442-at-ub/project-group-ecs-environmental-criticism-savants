<?php

function time_update($type,$change,$date){
    $ret ="";
    if($type == "day"){
        $ret = dayUpdate($change, $date);
    }elseif ($type == "month"){
        $ret = monthOverflow($change, $date);
    }else{
        $ret = yearUpdate($change,$date);
    }
    return $ret;
}

function yearUpdate($cur,$date){
    return "";
}

function monthUpdate($cur,$date){
  //  monthOverflow();
}

function monthOverflow($time,$mon){
    $ret = $time;
    $cur = explode(" ",$ret)[1];
    while ($mon != $cur){
        $ret = "";
        $cur = explode(" ",$ret)[1];
    }
    return $ret;
}

function dayUpdate($cur,$date){
    return "";
}