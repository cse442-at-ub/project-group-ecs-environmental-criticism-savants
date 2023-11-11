//Displays everything due on the selected date
function display(){
    let ret = []
    let tasks = req("");
    for (let i in tasks) {
        let a = tasks[i];
            ret.push(a);
    }
    //Chris can add his sort function here perhaps
    addElement(ret);
}

function req(input){
    let ret = [];
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Typical action to be performed when the document is ready:
            let r = xhttp.responseText;
            ret = JSON.parse(r);
        }
    };
    xhttp.open("POST",'time_change.php', false);
    xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded")
    let send = "tasks=" + input
    xhttp.send(send);
    console.log(ret)
    return ret;
}

function addElement(tasks){
    let colors = {"one":"#008000FF","two":"#0000FFFF","three":"#FFFF00FF","four":"#800080FF","five":"#FFA500FF","six":"#FF0000FF"};
    let mains = document.getElementById("main");
    let m = mains.children;
    while (m.length >0) {
        mains.removeChild(m[0]);
        m = mains.children;
    }
    for (i of tasks){
        let p = document.createElement("p");
        let text = document.createTextNode(i["name"]);
        p.appendChild(text);
        p.className = "task-text";

        let d1 = document.createElement("div");
        d1.className = "task";
        d1.id = i['name']

        let name = i['name']

        let b1 = document.createElement("button");
        let text1 = document.createTextNode("edit")
        b1.className = "task-but";
        b1.onclick = function () {edit({name})}
        b1.appendChild(text1)

        let b2 = document.createElement("button");
        let text2 = document.createTextNode("remove")
        b2.className = "task-but";
        b2.onclick = function () {remove({name});};
        b2.appendChild(text2)

        d1.appendChild(b1);
        d1.appendChild(b2);
        d1.appendChild(p);

        let info = addInfo(i);
        d1.appendChild(info)

        mains.appendChild(d1);
    }
}

function remove(id){
    let mains = document.getElementById("main");
    let node = document.getElementById(id['name']);
    req(id['name'])
    mains.removeChild(node);
}

function edit(id){
    let name = id['name'];
    let dead = document.getElementById("deadline " + name).innerHTML;
    let desc = document.getElementById("desc " + name).innerHTML;
    let occur = document.getElementById("occur " + name).innerHTML;
    let pri = document.getElementById("pri " + name).innerHTML;

    document.getElementById("name").value = name;
    document.getElementById("deadline").value = dead;
    document.getElementById("description").value = desc;

    document.getElementById(occur).checked =true
    document.getElementById(pri).checked =true
    remove(id);
}

function addInfo(task){
    let d1 = document.createElement("div");

    let deadline = document.createElement("div");
    deadline.id = "deadline " + task['name'];
    deadline.hidden = true;
    deadline.innerHTML = task['deadline']

    let desc = document.createElement("div");
    desc.id = "desc " + task['name'];
    desc.hidden = true;
    desc.innerHTML = task['description'];

    let occur = document.createElement("div")
    occur.id = "occur " + task['name']
    occur.hidden = true;
    occur.innerHTML = task['recurrence']

    let pri = document.createElement("div")
    pri.id = "pri " + task['name']
    pri.hidden = true;
    pri.innerHTML = task['priority']

    d1.appendChild(deadline)
    d1.appendChild(desc)
    d1.appendChild(occur)
    d1.appendChild(pri)

    return d1;
}