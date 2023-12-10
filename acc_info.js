// Open / Closes the change password prompt.
// thanks for the code dan -chris
function displayChangePassword(elem, state) {
    let popUp = document.getElementById(elem);
    // if pop-up was told to open
    if(state) {
        popUp.removeAttribute("hidden")
    }
    // if pop-up was told to close
    else {
        popUp.setAttribute("hidden", "");
        if(elem == "ID_changePassPopup"){
            let input1 = document.getElementById("current_password");
            let input2 = document.getElementById("new_password");
            let input3 = document.getElementById("reenter_password")
            input1.value = "";
            input2.value = "";
            input3.value = "";
        }
    }
}

function changetheme(){
    var stylechanger = document.getElementById("stylesheets");
    if(stylechanger.href.includes("AccInfo_Style.css")){
        stylechanger.href = 'Accinfodark.css';
        localStorage.setItem('theme', '1');
    }
    else{
        stylechanger.href = "AccInfo_Style.css";
        localStorage.setItem('theme', '0');
    }

    var submitter = document.getElementById("submitt");
    submitter.submit();
}