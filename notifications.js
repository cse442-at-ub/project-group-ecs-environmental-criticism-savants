// Displays Tasks Due Within a Week Or Less
function page_load() {
    let time = new Date;
    let tasks = retrieve_tasks("");
    let taskDueSoon = dateFilter(tasks, time);
}
function retrieve_tasks(input) {
    let ret = [];
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // Typical action to be performed when the document is ready:
            let r = xhttp.responseText
            ret = JSON.parse(r);
        }
    };
    xhttp.open("POST", "notifsRetrieveTasks.php", false);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    let send = "tasks=" + input;
    xhttp.send(send);
    console.log(ret);
    return ret;
}

function dateFilter(tasks, time){
    let week_later = new Date(time)
    week_later.setDate(week_later.getDate() + 7);
    console.log("Today's date is " + time.toString());
    console.log("In a week it will be " + week_later.toString());
    return -1;
}