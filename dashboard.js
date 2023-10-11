//Loads essential items when page loads
function page_load(){
    load_tasks();
    load_name();
    set(new Date);
}

//Loads in all task cards associated with the user
function load_tasks(){
    //Functionality coming in sprint 3
}

//Set's the users name in the page banner
function load_name() {
    let well = document.getElementById("user");
    well.innerHTML = well.innerHTML + "user";
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

// Increments or decreases the year elements on click
function yearUpdate(cur){
    const el = document.getElementById("year");
    let up = parseInt(el.innerHTML) + cur;
    let day = document.getElementById("day").innerHTML.slice(5);
    day = day + " " + up;
    let mon = day.split(" ")[0]
    document.getElementById(mon).style.background = "#E5E5E5";
    let time = monthOverflow(new Date(day), mon);
    set(time);
}

// Changes the current month based off of which month was selected
function monthUpdate (cur) {
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

// Increments or decreases date
function dayUpdate(cur) {
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



function disp(state) {
    let pop = document.getElementById("exit");
    if (state) {
        pop.removeAttribute("hidden");
    }else{
        pop.setAttribute("hidden","");
    }
}

//Implementation to be added later with signup/login
function log_out() {

}
