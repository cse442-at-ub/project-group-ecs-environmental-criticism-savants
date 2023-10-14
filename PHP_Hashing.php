<?php
include "sign.php";
$username;
$password;
//function which will just get the user input (username and password) for log in and sign in
function GetUserInputSignLog()
{
    if(isset($_POST['username'])) $username = $_POST['username'];
    if (isset($_POST['password'])) $password = $_POST['password'];
    echo $password;
}
//Safety call of the function to try to ensure that username/password isn't blank when we want to use it.
//(Depending on how other files are implemented, might be able to remove this.
GetUserInputSignLog();

//This function will check the username on sign in to make sure it exists within the database
function VerifyExistingUsername($User){
    
}

//Function which will verify when logging in if the password entered matches a user
function VerifyExistingPassword ($User, $Pass) {
    //use password_verify($password, $hashed_password) function
}

//Function which will take a username and password during sign in and store them
//into the database to save users
function StoreUserDataSignLog ($User, $Pass){
    //use password_hash function to salt and hash the password
}

?>