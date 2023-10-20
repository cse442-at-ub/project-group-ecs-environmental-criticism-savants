//Loads essential items when page loads
function page_load(){
    load_tasks();
    set(new Date);
    validCheck();
}

//Loads in all task cards associated with the user
function load_tasks(){
    //Functionality coming in sprint 3
}

function nav(){
    window.location.href = "-------.html"
}

// Sets the day and year elements, highlights the correct month when dashboard.php loads
function set(time) {
    let date = time.toDateString().split(' ');
    let day = document.getElementById("day");
    let year = document.getElementById("year");
    year.innerHTML = date[3];
    day.innerHTML = date[0] + ", " + date[1] + " " + date[2];
    document.getElementById(date[1]).style.background = "#80B4F0"
}

// Increments or decreases the year elements on click, calls set to update
function yearUpdate(cur){
    validCheck();
    const el = document.getElementById("year");
    let up = parseInt(el.innerHTML) + cur;
    let day = document.getElementById("day").innerHTML.slice(5);
    day = day + " " + up;
    let mon = day.split(" ")[0]
    document.getElementById(mon).style.background = "#E5E5E5";
    let time = monthOverflow(new Date(day), mon);
    set(time);
}

// Changes the current month based off of which month was selected, calls set to update
function monthUpdate (cur) {
    validCheck();
    let day = document.getElementById("day").innerHTML.slice(5).split(" ");
    let year = document.getElementById("year").innerHTML;
    document.getElementById(day[0]).style.background = "#E5E5E5";
    let date = cur + " " + day[1] + " " + year;
    let time = monthOverflow(new Date(date),cur);
    set(time);
}

//ensures that changing months/year never has an overflow (31->30, leapyear->not)
function monthOverflow(time, mon) {
    let ret = time;
    let cur = ret.toDateString().split(" ")[1];
    while (mon !== cur) {
        ret.setDate(ret.getDate()+ -1)
        cur = ret.toDateString().split(" ")[1];
    }
    return ret;
}

// Increments or decreases date, calls set to update
function dayUpdate(cur) {
    validCheck();
    let day = document.getElementById("day").innerHTML.slice(5);
    day = day + " " + document.getElementById("year").innerHTML;
    let date = new Date(day);
    let month1 = date.toDateString().split(' ')[1];
    date.setDate(date.getDate()+ cur)
    let month2 = date.toDateString().split(' ')[1];
    if (month1 !== month2) {
        document.getElementById(month1).style.background = "#E5E5E5";
    }
    set(date);
}


//Open/closes the log out pop-up
function disp(state) {
    let pop = document.getElementById("exit");
    if (state) {
        pop.removeAttribute("hidden");
    }else{
        pop.setAttribute("hidden","");
    }
}

// Logs out of the page and returns user to the log out page
function log_out() {
    //* functionality should be added here that destroys the login token, if it exists
   localStorage.setItem("valid", "false");
   validCheck();
}

//* there needs to be a function here the conintuosly checks for a valid login token,
//* If there is no token then dashbaord should exit to the log in page
function validCheck(){
    if (localStorage.getItem("valid") !== "true"){
        window.location.href = "log.php";
    }
}
