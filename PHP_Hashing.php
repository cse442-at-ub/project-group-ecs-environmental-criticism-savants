<?php
//Removed the include statements since I do not think they are needed
//If the form action is to send the user here (or anywhere else I think) - since POST is a global variable

//declaration of user input variables for log in/sign up
$username;
$password;

//function which will just get the user input (username and password) for log in and sign in
function GetUserInputSignLog()
{
    if(isset($_POST['username'])) $username = $_POST['username'];
    if (isset($_POST['password'])) $password = $_POST['password'];
    echo $password; //printing retrieved password to stdout for verification
    echo $username;
}
//Safety call of the function to try to ensure that username/password isn't blank when we want to use it.
//(Depending on how other files are implemented, might be able to remove this.
GetUserInputSignLog();

//This function will check the username on sign in to make sure it exists within the database
function VerifyExistingUsername($User): bool {
    //connect to the database
    //check where usernames are stored in the database
    //confirm that a username in the DB matches the entered one
    //if there is a match, return TRUE
    //else FALSE
    //Close database connection
}

//Function which will verify when logging in if the password entered matches a user
function VerifyExistingPassword ($User, $Pass): bool {
    //use password_verify($password, $hashed_password) function

    //Connect to database
    //verify the username exists in DataBase
    //if it doesn't, error, user doesn't exist
    //else, pass the stored hashed password as $hashed_password) and $Pass as $password for password_verify
    //if false, error, wrong password
    //else correct user and password, log in the user.
    //close database connection
}

//Function which will take a username and password during sign in and store them
//into the database to save users
function StoreUserDataSignLog ($User, $Pass) {
    //use password_hash function to salt and hash the password

    //connect to database
    //store the username in the respective column
    //store the password in the respective column
    //close database connection
}

?>