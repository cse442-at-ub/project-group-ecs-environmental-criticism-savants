<?php
include "Credential-Template.php";
include "DBConnection-Function.php";
    session_start(); // CHANGE ME! Is this neccessary?
    $dom = new DOMDocument();
    $dom->loadHTMLFile("settings_AccInfo.html");
    $dom1 = new DOMDocument();
    $dom1->loadHTMLFile("news.html");
    $dom2 = new DOMDocument();
    $dom2->loadHTMLFile("notifications.html");

    $username = "nothing";
    if(isset($_SESSION['user_token']) && isset($_SESSION['user_username'])) {
        $username = $_SESSION['user_username']; // Retrieve the username from the session
    }
    $conn = get_database_connection(HOST, H_USERNAME, H_PASSWORD, DATABASE);
    //Get image from database for that user
    $imagesql = $conn->prepare("SELECT data FROM pictures WHERE user=?");
    $imagesql->execute([$username]);
    $fetchedimage = $imagesql->fetch(PDO::FETCH_NUM);
    if(!empty($fetchedimage[0])){
        $imagedata = $fetchedimage[0];
        // $imagenode = $dom->getElementById("userpfp");
        // $imagenode->src=$fetchedimage;
        // $imagenode->setElementById("userpfp")=$fetchedimage;
        $imagenode = $dom->getElementById("userpfp");
        $imagenode1 = $dom1->getElementById("newspfp");
        $imagenode2 = $dom2->getElementById("notifpfp");
        //Convert Blob to image readable by HTML
        $imageDataUri = "data:image/jpg;charset=utf8;base64," . base64_encode($imagedata);
        //Set image
        $imagenode->setAttribute("src", $imageDataUri);
        $imagenode1->setAttribute("src", $imageDataUri);
        $imagenode2->setAttribute("src", $imageDataUri);

    }
    $node = $dom->getElementById("ai_user");
    $node->textContent = $username;
    
    // <!-- <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($fetchedimage[0]);
    
    // $node1 = $dom->getElementById("chuck");
    // $node1->textContent = "img/userPFP.png";
    // $node1->textContent = "data:image/jpg;charset=utf8;base64, base64_encode($fetchedimage[0]);
    // echo $node1->textContent;
    $dom1->saveHTML();
    $dom2->saveHTML();
    echo $dom->saveHTML();
    
    $conn = null;
?>