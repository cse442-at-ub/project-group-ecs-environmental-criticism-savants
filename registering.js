function nav(filename){
    window.location.href = filename;
}

function sign(){
    let a = document.createAttribute("hidden");
    a.value="hidden";
    document.getElementById("there").setAttributeNode(a);
}


