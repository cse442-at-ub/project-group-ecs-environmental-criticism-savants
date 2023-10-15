<?php
//declaration of user input variables for log in/sign up
$username;
$password;

//When creating an account, this will check for incorrect inputs
function CheckUsernameAndPassword ($User, $Pass, $rePass) {
    if (VerifyExistingUsername($User)){return "taken";}
    else if ($Pass != $rePass) {return "match";}
    else if (strlen($Pass) < 8) {return "short";}
    else if (strlen($rePass) > 30) {return "long";}
    else if (strpos($User, " ") != False or strpos($Pass, " ") != False) {return "spaces";}
    else {return "done";}
}

//This function will check the username on sign in to make sure it exists within the database
function VerifyExistingUsername($User): bool {
    //connect to the database
    //check where usernames are stored in the database
    //confirm that a username in the DB matches the entered one
    //if there is a match, return TRUE
    //else FALSE
    //Close database connection
    return False;
}

//Function which will verify when logging in if the password entered matches a user
function VerifyExistingPassword ($User, $Pass): bool {
    //use password_verify($password, $hashed_password) function

    //Connect to database
    //verify the username exists in DataBase
    //if it doesn't, error, user doesn't exist
    //else, pass the stored hashed password as $hashed_password) and $Pass as $password for password_verify
    $UserExists = password_verify($Pass); // $(RETRIEVED PASSWORD HASH STORED IN DATABASE) //); PASSWORD_VERIFY IS MISSING A PARAMETER, REMEMBER TO ADJUST PROPER WHEN IMPLEMENTING FULLY
    //if false, error, wrong password
    //else correct user and password, log in the user.
    //close database connection
}

//Function which will take a username and password during sign in and store them
//into the database to save users
function StoreUserDataSignLog ($User, $Pass) {
    //use password_hash function to salt and hash the password
    $encryptedPassword = password_hash($Pass, PASSWORD_DEFAULT);
    //connect to database
    //store the username in the respective column
    //store the password in the respective column
    //close database connection
}

?>