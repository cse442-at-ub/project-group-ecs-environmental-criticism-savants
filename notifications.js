// This function is called when you visit the notifications tab (notifications.php)
function page_load() {
    let time = new Date;
    let tasks = retrieve_tasks("");
    console.log("User's Tasks Are:");
    console.log(tasks);
    /*
    for (let i of tasks) {
        console.log(i.deadline);
    }
    */
    let tasksDueSoon = dateFilter(tasks, time);
    console.log("Tasks due in a week or less are: ")
    console.log(tasksDueSoon);
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
function dateFilter(tasks, time) {
    let week_later = new Date(time)
    week_later.setDate(week_later.getDate() + 7);
    console.log("Today's date is " + time.toString());
    console.log("In a week it will be " + week_later.toString());
    let ret = []
    for (let i of tasks) {
        let task_date = new Date(i.deadline);
        if (task_date <= week_later) {
            ret.push(i);
        }
    }
    return ret;
}

// This function loads the tasks in the notifications list.
function load_tasks(tasks) {
    let notif = document.getElementById("notifs");
    for (let i of tasks) {
        let p = document.createElement("p");
        let today = new Date()
        let task_date = new Date(i.deadline);
        let text = document.createTextNode("Due: " + i["deadline"] + " - "  + i["name"] + " - " + i["description"]);
        if (task_date < today) {
            text = document.createTextNode("[DEADLINE PASSED] Due:   " + i["deadline"] + " - "  + i["name"] + " - " + i["description"]);
        }
        p.appendChild(text);
        p.className = "task-text";

        let name = i["name"]
        let d1 = document.createElement("div")
        d1.className = "sample";
        d1.id = name;
        /*
        let d2 = document.createElement("div");
        d2.className = "task-pri";
        d2.style.background = colors[i["priority"]];
        */
        d1.appendChild(p)
        notif.appendChild(d1);

    }
}
