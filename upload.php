
<?php 
// Include the database configuration file  
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
$status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 
    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) { 
        
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
         
            // Insert image content into database 
            $insert = $conn->query("UPDATE users SET data='$imgContent' WHERE username='$username'"); 
             
            if($insert){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPe allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
} 
$conn=null;
// Display status message 
echo $statusMsg; 
?>