<?php

//Function called by mid.php to set default picture for new user
function set_default_pic($username, $conn){
    $query= $conn->prepare("INSERT INTO pictures VALUES (?, ?)");
    $imgContent = file_get_contents("img/finaluserpfp.jpg"); //Get BLOBY for default png
    $query->execute([$username,$imgContent]);


}

?>