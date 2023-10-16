function nav(filename){
    if(filename === 'dashboard.php'){
        localStorage.setItem("valid","true");
    }
    window.location.href = filename;
}