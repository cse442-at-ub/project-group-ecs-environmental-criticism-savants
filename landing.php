<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Savant</title>
    <link rel="stylesheet" type="text/css" href="landing_dark.css" id = "style" onload="swap(localStorage.getItem('mode'))"/>
<body>
    <div class="banner"></div>

    <div>
        <button class ="switch" type="button" onclick= "swap('dark')" id ="dark">Dark Mode</button>
        <button hidden="hidden" class ="switch" type="button" onclick= "swap('light')" id ='light'>Light Mode</button>
    </div>
    <script type="text/JavaScript">
        function swap(mode) {
            let style = document.getElementById('style');
            let light = document.getElementById('light');
            let dark = document.getElementById('dark');
            let a = document.createAttribute("hidden");
            a.value = "hidden";
            if (mode === 'dark') {
                dark.setAttributeNode(a)
                light.removeAttribute("hidden")
                style.setAttribute('href', 'landing_dark.css');
            } else {
                light.setAttributeNode(a)
                dark.removeAttribute("hidden")
                style.setAttribute('href', 'landing.css');
            }
            localStorage.setItem('mode', mode);
        }


    </script>

    <div class="wel">Welcome to Savant</div>

    <div class="side-box">
       <span  class="intro">Savant is an excellent tool to help:</span>
        <ol  class="list">
            <li> Organize events </li>
            <li> Keep track of school work </li>
            <li>Keep track of birthday, anniversaries and other special events </li>
        </ol>
    </div>

    <div>
        <button type="button" value="create page" onclick="sign_page()" class="create"> Click here to create an account </button>
    </div>

    <div>
        <button type="button" value="create page" onclick="log_page()" class="log">Click here to log in to an account </button>
    </div>

    <script type="text/JavaScript">
        function log_page() {
            window.location.href = "log.php";
        }
        function sign_page() {window.location.href = "sign.php";}
    </script>
</body>
</html>