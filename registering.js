//When clicking the log in button
function log(){
    let user = document.getElementById("username");
    let pass = document.getElementById("password");
    let username = user.value; let password = pass.value;
    user.value = ""; pass.value = "";
    let valid = userCheck(username, password);
    if (valid === true){

    }
}

function userCheck(username, password){
    console.log(username + " " + password)
    return true;
}