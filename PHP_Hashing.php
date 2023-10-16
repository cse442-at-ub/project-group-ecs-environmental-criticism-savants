<?php
//When creating an account, this will check for incorrect inputs
function CheckUsernameAndPassword ($User, $Pass, $rePass, $conn) {
    if (VerifyExistingUsername($User, $conn)){return "taken";}
    else if ($Pass != $rePass) {return "match";}
    else if (strlen($Pass) < 8) {return "short";}
    else if (strlen($rePass) > 30) {return "long";}
    else if (strpos($User, " ") != False or strpos($Pass, " ") != False) {return "spaces";}
    else {return "done";}
}

//This function will check the username on sign in to make sure it exists within the database
function VerifyExistingUsername($User, $conn): bool {
    //check where usernames are stored in the database
    $sql = "SELECT username FROM users WHERE username = '" + $User + "'" ;
    $request = $conn->query($sql);
    //confirm that a username in the DB matches the entered one
    if (!($request == null)) {
        //if there is a match, return TRUE
        return True;
    }
    //else FALSE because no user of that name exists
    else{
        return False;
    }
}

//Function which will verify when logging in if the password entered matches a user
function VerifyExistingPassword ($User, $Pass, $conn): bool {
    //verify the username exists in DataBase
    if (!VerifyExistingUsername($User, $conn)){
        //get hashed password for user
        $sql  = "SELECT hashedpass FROM users WHERE username = '" + $User +"'";
        $hashed = $conn->query($sql, PDO::FETCH_DEFAULT);;
        // check if the inputted password matches the hashed
        if (password_verify($Pass, $hashed[0])) {
            return True;
        }
        // else password input is wrong
        else {
            return False;
        }
    }
    //if it doesn't, error, user doesn't exist
    else{
        return False;
    }
}

//Function which will take a username and password during sign in and store them
//into the database to save users
function StoreUserDataSignUp ($User, $Pass, $conn) {
    //use password_hash function to salt and hash the password
    $encryptedPassword = password_hash($Pass, PASSWORD_DEFAULT);
    
    //store the username in the respective column
    //store the password in the respective column
    $request = "INSERT INTO users (username, hashedpass) VALUES ('" + $User + "', '" + $encryptedPassword +"')";
    $conn->exec($request);
}
//some testing statements for PM meeting
//SELECT username FROM users WHERE username = 'admin'
//SELECT hashedpass FROM users WHERE username = 'admin'
//INSERT INTO users (username, hashedpass) VALUES ('testuser', 'testHash')
?>