function nav(filename){
    window.location.href = filename;
}

window.addEventListener('resize', function() {
    var contentEl = document.getElementById('body');
    if (window.innerWidth < 1920) {
        contentEl.style.overflowY = 'auto';
    } else {
        contentEl.style.overflowY = 'hidden';
    }
});