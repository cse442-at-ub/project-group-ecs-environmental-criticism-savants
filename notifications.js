// This function is called when you visit the notifications tab (notifications.php)
let today = new Date;
function page_load() {
    let tasks = retrieve_tasks("");
    // console.log("User's Tasks Are:");
    // console.log(tasks);
    /*
    for (let i of tasks) {
        console.log(i.deadline);
    }
    */
    let tasksDueSoon = dateFilter(tasks);
    // console.log("Tasks due in a week or less are: ")
    // console.log(tasksDueSoon);
    load_tasks(tasksDueSoon);
}
// This function retrieves the tasks from the server-side
function retrieve_tasks(input) {
    let ret = [];
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            // Typical action to be performed when the document is ready:
            let r = xhttp.responseText
            ret = JSON.parse(r);
        }
    };
    xhttp.open("POST", "notifsRetrieveTasks.php", false);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    let send = "tasks=" + input;
    xhttp.send(send);
    return ret;
}
// This function filters the retrieved tasks by tasks due in a week or less
function dateFilter(tasks) {
    let week_later = new Date;
    today.setHours(0, 0, 0, 0)
    week_later.setDate(week_later.getDate() + 7);
    // console.log("Today's date is " + time.toString());
    // console.log("In a week it will be " + week_later.toString());
    let ret = []
    for (let i of tasks) {
        let dateParts = i.deadline.split('-');
        let task_date = new Date(Number(dateParts[0]), Number(dateParts[1])-1, Number(dateParts[2]));
        // console.log(dateParts);
        // console.log(task_date);
        if ((task_date <= week_later) && !(task_date < today)) {
            ret.push(i);
        }
        else if((task_date <= week_later) && (task_date < today)) {
            ret.unshift(i);
        }
    }
    return ret;
}

// This function loads the tasks in the notifications list.
function load_tasks(tasks) {
    let notif = document.getElementById("notifs");
    for (let i of tasks) {
        let dateParts = i.deadline.split('-');
        let task_date = new Date(Number(dateParts[0]), Number(dateParts[1])-1, Number(dateParts[2]));
        let deadline = document.createTextNode("Due: " + i["deadline"]);
        let p = document.createElement("p");
        let line_break = document.createElement("br");
        let tName = document.createTextNode("Task Name: " + i["name"])
        today.setHours(0, 0, 0, 0)
        if (task_date < today) {
            // console.log(i.deadline);
            // console.log(task_date);
            // console.log(today);
            deadline = document.createTextNode("[DEADLINE PASSED] Due: " + i["deadline"]);
        }
        p.appendChild(deadline);
        p.appendChild(line_break);
        p.appendChild(tName);

        let d1 = document.createElement("div");
        d1.className = "sample";
        d1.id = i["name"];
        d1.appendChild(p);
        notif.appendChild(d1);

    }
}
