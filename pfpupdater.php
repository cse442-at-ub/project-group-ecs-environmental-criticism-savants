<?php


function set_default_pic($username, $conn){
    $query= $conn->prepare("INSERT INTO pictures VALUES (?, ?)");
    $imgContent = file_get_contents("img/userPFP.jpg");
    $query->execute([$username,$imgContent]);


}

?>