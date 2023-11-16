
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
         
        // Allow certain file formats JPEG not working bug!
        $allowTypes = array('jpg','png','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
        if ($_FILES["image"]["size"] < 10000000) {
            $insert = $conn->query("UPDATE pictures SET data='$imgContent' WHERE user='$username'"); 
            $conn=null;
            if($insert){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
            }else{ 
                $statusMsg = "File upload failed due to weak network please try again"; 
            }    
        }
        else{
             $statusMsg = "Please upload a smaller file";
        }
             
             
        }else{ 
            $statusMsg = 'Please upload only jpg, png, or gif files'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload'; 
    } 
} 
 //Disconnect database
// Display status message 
// echo $statusMsg;
?>
<!-- Added Script to redirect back to page after showing status of image upload -->
<script>
    const phpecho="<?php echo $statusMsg; ?>";
             alert(phpecho); 
             window.history.go(-1);</script>;
