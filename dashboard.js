//Loads essential items when page loads
function page_load(){
    set(new Date);
    validCheck();

}

function nav(filename){
    window.location.href = filename;
}

// Sets the day and year elements, highlights the correct month when dashboard.php loads
function set(time) {
    let date = time.toDateString().split(' ');
    let day = document.getElementById("day");
    let year = document.getElementById("year");
    year.innerHTML = date[3];
    day.innerHTML = date[0] + ", " + date[1] + " " + date[2];
    document.getElementById(date[1]).style.background = "#80B4F0";
    let t = time.toLocaleDateString();
    t = t.split("/");
    if (parseInt(t[1]) < 10) {
        t[1] = "0" + t[1];
    }
    if(parseInt(t[0])<10){
        t[0] = "0" + t[0];
    }
    t = t[2] + "-" + t[0] + "-" + t[1];
    display(t);
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

//Displays everything due on the selected date
function display(time){
    let tasks = req("tasks=",'time_change.php');
    let friends = req("friends=","friends-get.php");
    let today = dateFilter(tasks, time);
    today = color_sort(today);
    let year = parseInt(time.split('-')[0])
    friends = birthDateFilter(friends, time)
    console.log(friends)
    friendDisplay(friends, year);
    addElement(today);
}

function friendDisplay(friends, year){
    let mains = document.getElementById("main");
    let m = mains.children;
    while (m.length >0) {
        mains.removeChild(m[0]);
        m = mains.children;
    }
    for (i of friends) {
        let age = year - parseInt(i['date']);
        let p = document.createElement("p");
        p.innerHTML =  i['full_name'] + " turns " + age;
        p.className = "friend-text";

        let name = i['full_name']
        let d1 = document.createElement("div");
        d1.className = "task";
        d1.id = name;

        d1.appendChild(p)
        mains.appendChild(d1)

    }

}

function remove(id){
    let mains = document.getElementById("main");
    let node = document.getElementById(id['name']);
    let input = "tasks=" + id['id']
    req(input,'time_change.php')
    mains.removeChild(node);
}

function req(input, filename){
    let ret = [];
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Typical action to be performed when the document is ready:
            let r = xhttp.responseText;
            ret = JSON.parse(r);
        }
    };
    xhttp.open("POST",filename, false);
    xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded")
    xhttp.send(input);
    return ret;
}

// Removes all the tasks not due on that day from all the tasks for that user
function dateFilter(tasks, date){
    let ret = []
    for (let i in tasks) {
        let a = tasks[i];
        if (a['deadline'] === date){
            ret.push(a);
        }
    }
    return ret;
}

// Removes all the tasks not due on that day from all the tasks for that user
function birthDateFilter(tasks, date){
    let comp = date.split('-')
    let birth = comp[1] + '-' + comp[2]
    let ret = []
    for (let i in tasks) {
        let a = tasks[i];
        let person = (a['date']).split('-')
        if (person[1] +'-' + person[2] === birth){
            ret.push(a);
        }
    }
    return ret;
}
// Takes the array of tasks that are due today, and sorts them by their color priority.
// Red = Priority Level 6
// Orange = Priority Level 5
// Purple = Priority Level 4
// Yellow = Priority Level 3
// Blue = Priority Level 2
// Green = Priority Level 1
function color_sort(tasks) {
    let priorityToInt = {
        "one": 1,
        "two": 2,
        "three": 3,
        "four": 4,
        "five": 5,
        "six": 6
    }
    tasks.sort((a, b) => {
        let priorityA = priorityToInt[a.priority];
        let priorityB = priorityToInt[b.priority];
        return priorityB - priorityA
    });
    return tasks
}
function addElement(tasks){
    let colors = {"one":"#008000FF","two":"#0000FFFF","three":"#FFFF00FF","four":"#800080FF","five":"#FFA500FF","six":"#FF0000FF"};
    let mains = document.getElementById("main");
    for (i of tasks){
        let p = document.createElement("p");
        let text = document.createTextNode(i["name"] + ": " + i["description"]);
        p.appendChild(text);
        p.className = "task-text";

        let name = i['name']
        let d1 = document.createElement("div");
        d1.className = "task";
        d1.id = name;

        let b = document.createElement("button")
        b.innerHTML = "Complete"
        b.className = "task-but"
        b.onclick = function () {remove({name});};

        let d2 = document.createElement("div");
        d2.className = "task-pri";
        d2.style.background = colors[i["priority"]];

        d1.appendChild(b)
        d1.appendChild(d2);
        d1.appendChild(p);
        mains.appendChild(d1);
     }
}
window.addEventListener('resize', function() {
    var contentEl = document.getElementById('body');
    if (window.innerWidth < 1920) {
      contentEl.style.overflowY = 'auto';
    } else {
      contentEl.style.overflowY = 'hidden';
    }
}