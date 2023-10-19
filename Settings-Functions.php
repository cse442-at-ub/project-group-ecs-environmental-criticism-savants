<?php
include "PHP_Hashing.php";
// when the button to change their password is clicked, use the "CheckUsernameAndPassword() function with param $User = " "
// And $Pass = $rePOass = input new password. By definition of our input requirements user " " will never exist,
// meaning only password will be checked. This will check if the password they are trying to change to is a valid password
// (Above function is in "PHP_Hashing.php"
// use "VerifyExistingPassword" to make sure their inputted "current password" matches the actual password they used to sign in.

function CreateChangePasswordFlag ($User, $Password, $NewPassword, $reNewPassword, $conn){
    $PasswordExists = VerifyExistingPassword($User, $Password, $conn);
    // If the inputted current password matches the password in database for user
    if ($PasswordExists){
        // check if the new password entered obeys our password rules
        return CheckUsernameAndPassword(" ", $NewPassword, $reNewPassword, $conn);
    }
    // if the inputted current password is wrong
    else{
        return "WRONG CURRENT PASSWORD ERROR FLAG PLACEHOLDER";
    }
}
?>