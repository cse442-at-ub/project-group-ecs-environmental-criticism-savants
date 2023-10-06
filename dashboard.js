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
    var day = document.getElementById("day").innerHTML.slice(5);
    day = day + " " + up;
    set(new Date(day));
}

// Changes the current month based off of which month was selected
function monthUpdate (cur) {
    let day = document.getElementById("day").innerHTML.slice(5).split(" ");
    let year = document.getElementById("year").innerHTML;
    document.getElementById(day[0]).style.background = "#E5E5E5";
    let date = cur + " " + day[1] + " " + year;
    set(new Date(date));
}

// Inrements or decreases date
function dayUpdate(cur) {
    var day = document.getElementById("day").innerHTML.slice(5);
    day = day + " " + document.getElementById("year").innerHTML;
    let date = new Date(day);
    let month1 = date.toDateString().split(' ')[1];
    date.setDate(date.getDate()+ cur)
    let month2 = date.toDateString().split(' ')[1];
    if (month1 != month2) {
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

//Implamentation to be added later with signup/login
function log_out() {

}
