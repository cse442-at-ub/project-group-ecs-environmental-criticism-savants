//When clicking the log in button this function clears the username and password fields,
// passes those values to userCheck, and either displays the dashboard button or an error screen
function log(){
    let user = document.getElementById("username");
    let pass = document.getElementById("password");
    let username = user.value; let password = pass.value;
    user.value = ""; pass.value = "";
    let valid = userCheck(username, password);
    document.getElementById("pop-up").removeAttribute("hidden");
    if (valid){
        localStorage.setItem("user",username);
        //* there should be a function here that creates a token to continuously validate log in information going forward
        document.getElementById("dash").removeAttribute("hidden");
        document.getElementById("dash-button").removeAttribute("hidden");
    }else{
        document.getElementById("bad").removeAttribute("hidden");
        document.getElementById("bad-button").removeAttribute("hidden");
    }
}

//Validates log in data. Checks for spaces and empty strings before passing those values to ----
// Which validates the info against the database
function userCheck(username, password){
    let U = username.includes(" ") || username === "";
    let P = password.includes(" ") || password ==="";
    if (U || P){ return false}
    //* Instead of true database team should replace with a function that connects
    //* with the database and validates the username and password, that function should return a boolean value
    let valid = true
    return valid;
}

function sign(){
    let user = document.getElementById("username");
    let pass = document.getElementById("password");
    let username = user.value; let password = pass.value;
    user.value = ""; pass.value = "";
    let uValid = userExists(username);
    let pValid = passCheck(password);
    document.getElementById("pop-up").removeAttribute("hidden");
    if (uValid && pValid){
        //* there should be a function here that encodes the entered information into the database
        //* there should be a function here that creates a token to continuously validate log in information going forward
        localStorage.setItem("user",username);
        document.getElementById("dash").removeAttribute("hidden");
        document.getElementById("dash-button").removeAttribute("hidden");
    }
    //This is to catch when one field is correct and the other isn't, to give the user better feedback on what went wrong.
    else if(uValid || pValid){
        if (pValid){
            document.getElementById("bad-name").removeAttribute("hidden");
            document.getElementById("bad-button").removeAttribute("hidden");
        }else{
            document.getElementById("bad-pass").removeAttribute("hidden");
            document.getElementById("bad-button").removeAttribute("hidden");
        }
    }
    else{
        //This else section needs to be expanded after we come up with rules for username and password
        document.getElementById("bad-name").removeAttribute("hidden");
        document.getElementById("bad-pass").removeAttribute("hidden");
        document.getElementById("bad-button").removeAttribute("hidden");
    }
}

// checks the existing database for usernames, returns false when a match is made or name is invalid
function userExists(username){
    if(username.includes(" ") || username === ""){return false}
    //* Database team should change true to a function that returns a boolean value of true,
    //* when no matches are found, and false in every other instance
    let valid = true;
    return valid;
}

//checks to see if it is a valid password
function passCheck(password){
    if(password.includes(" ") || password === "" || password.length <8){return false}
    //* Database team should change true to a function that returns a boolean value of true,
    //if the password is valid, and false in every other instance
    let valid = true;
    return valid;
}

//Closes the error box when clicking Retry
function hide() {
    document.getElementById("pop-up").setAttribute("hidden","");
    document.getElementById("bad-name").setAttribute("hidden","");
    document.getElementById("bad-pass").setAttribute("hidden","");
    document.getElementById("bad-button").setAttribute("hidden","");
    document.getElementById("dash").setAttribute("hidden","");
    document.getElementById("dash-button").setAttribute("hidden","");
}
