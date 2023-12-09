function nav(filename){
    window.location.href = filename;
}

//Displays all of a users friends when the page loads
function display(){
    let blank = ["","",""]
    let friends = req(blank)
    let ret = []
    for (let i in friends) {
        let a = friends[i];
        ret.push(a);
    }
    addElement(ret)
}

//Removes a friends from HTML and the DB
function remove(id){
    let mains = document.getElementById("main");
    let node = document.getElementById(id[0]);
    req(id)
    mains.removeChild(node);
}

//requests DB friends array
function req(input){
    let ret = [];
    let temp = JSON.stringify(input);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Typical action to be performed when the document is ready:
            let r = xhttp.responseText;
            ret = JSON.parse(r);
        }
    };
    xhttp.open("POST",'friends-get.php', false);
    xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded")
    let send = "friends=" + temp
    xhttp.send(send);
    return ret;
}

//Adds each friends profile graphically to the page
function addElement(friends){
    let mains = document.getElementById("main");
    for(i of friends){
        let p1 = document.createElement("p");
        let d1 = document.createElement("div")
        d1.className = "name"
        let text1 = document.createTextNode(i["full_name"]);
        p1.appendChild(text1);
        p1.className = "inner";
        d1.appendChild(p1)

        let p2 = document.createElement("p");
        let d2 = document.createElement("div")
        d2.className = "name"
        let text2 = document.createTextNode(i["date"]);
        p2.appendChild(text2);
        p2.className = "inner";
        d2.appendChild(p2)

        let p3 = document.createElement("p");
        let d3 = document.createElement("div")
        d3.className = "name"
        let text3 = document.createTextNode(diff(i['date']));
        p3.appendChild(text3);
        p3.className = "inner";
        d3.appendChild(p3)

        let id = i["full_name"]
        let send = [i['full_name'],i["date"],i["email"]]
        let b = document.createElement("button");
        b.className = "name"
        b.innerHTML = "REMOVE";
        b.onclick = function () {remove(send)}

        let dm = document.createElement("div")
        dm.className = "profile"
        dm.id = id
        dm.appendChild(d1)
        dm.appendChild(d2)
        dm.appendChild(d3)
        dm.appendChild(b)

        mains.appendChild(dm)

    }
}

//returns the string for how many days a persons birthday is away.
function diff(birth){
    let ret = ""
    let today = new Date()
    let f = birth.split("-")
    let friend = new Date(parseInt(f[0]),parseInt(f[1])-1,parseInt(f[2]))
    let age = today.getFullYear() - friend.getFullYear();
    let days = friend.getDate() - today.getDate()
    let months = friend.getMonth() - today.getMonth()
    if(months == 0){
        if(days == 0) {
            ret = age + " today!!"
        }else if(days < 0){
            ret = (age+1) + " in 12 months"
        }else{
            ret = age + " in " + days + " days"
        }
    }else{
        if(months < 0){
            ret = (age+1) + " in " + (12 + months) + " months"
        }else {
            ret = age + " in " + months + " months"
        }
    }
    return ret
}