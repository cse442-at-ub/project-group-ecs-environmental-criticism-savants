<?php
include "Credential-Template.php";
include "DBConnection-Function.php";
    session_start();
    $dom = new DOMDocument();
    $dom->loadHTMLFile("settings_AccInfo.html");

    $username = "nothing";
    if(isset($_SESSION['user_token']) && isset($_SESSION['user_username'])) {
        $username = $_SESSION['user_username']; // Retrieve the username from the session
    }
    $conn = get_database_connection(HOST, H_USERNAME, H_PASSWORD, DATABASE);
    //check if image exists
    $imagesql = $conn->prepare("SELECT data FROM users WHERE username=?");
    $imagesql->execute([$username]);
    $fetchedimage = $imagesql->fetch(PDO::FETCH_NUM);
    if(!empty($fetchedimage[0])){
        $imagedata = $fetchedimage[0];
        // $imagenode = $dom->getElementById("userpfp");
        // $imagenode->src=$fetchedimage;
        // $imagenode->setElementById("userpfp")=$fetchedimage;
        $imageDataUri = "data:image/jpg;charset=utf8;base64," . base64_encode($imagedata);
        $imagenode = $dom->getElementById("userpfp");
        $imagenode->setAttribute("src", $imageDataUri);
    }
    $node = $dom->getElementById("ai_user");
    $node->textContent = $username;
    $conn = null;
    // <!-- <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($fetchedimage[0]);
    
    // $node1 = $dom->getElementById("chuck");
    // $node1->textContent = "img/userPFP.png";
    // $node1->textContent = "data:image/jpg;charset=utf8;base64, base64_encode($fetchedimage[0]);
    echo $node1->textContent;
    echo $dom ->saveHTML();
?>