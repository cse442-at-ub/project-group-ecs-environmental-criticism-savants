<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Savant</title>
    <link rel="stylesheet" type="text/css" href="landing.css" id = "style"/>
</head>

<body>
    <div class="banner"></div>

    <div>
        <button class ="switch" type="button" onclick= "swap_dark()" id ="dark">Dark Mode</button>
        <button hidden="hidden" class ="switch" type="button" onclick= "swap_light()" id ='light'>Light Mode</button>
    </div>
    <script type="text/JavaScript">
        function swap_dark() {
            let style = document.getElementById('style');
            let light = document.getElementById('light');
            let dark = document.getElementById('dark');
            style.setAttribute('href', 'landing_dark.css');
            let a = document.createAttribute("hidden") ;
            a.value = "hidden"
            dark.setAttributeNode(a)
            light.removeAttribute("hidden")
            localStorage.setItem('mode', 'dark');

        }
        function swap_light() {
            let style = document.getElementById('style');
            let light = document.getElementById('light');
            let dark = document.getElementById('dark');
            style.setAttribute('href', 'landing.css');
            let a = document.createAttribute("hidden") ;
            a.value = "hidden"
            light.setAttributeNode(a)
            dark.removeAttribute("hidden")
            localStorage.setItem('mode', 'light');
        }

        function dark_check(){
            let d = localStorage.getItem('mode');
            console.log(d)
            if (d === 'dark') {
                swap_dark()
            }
        }
        dark_check()
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