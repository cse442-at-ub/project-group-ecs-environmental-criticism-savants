<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="sign_log_dark.css" id="style" onload="swap(localStorage.getItem('mode'))"/>
</head>
<body>
<div class="banner"></div>
<div>
    <button class ="switch" type="button" onclick= "swap('dark')" id ="dark">Dark Mode</button>
    <button hidden="hidden" class ="switch" type="button" onclick= "swap()" id ='light'>Light Mode</button>
</div>
<script type="text/JavaScript">
    function swap(mode) {
        let style = document.getElementById('style');
        let light = document.getElementById('light');
        let dark = document.getElementById('dark');
        let a = document.createAttribute("hidden") ;
        a.value = "hidden"
        if (mode === 'dark') {
            dark.setAttributeNode(a)
            light.removeAttribute("hidden")
            style.setAttribute('href', 'sign_log_dark.css');
        }else{
            light.setAttributeNode(a)
            dark.removeAttribute("hidden")
            style.setAttribute('href', 'sign_log.css');
        }
        localStorage.setItem('mode', mode);
    }
</script>
<div class="main">
    <div  class="title">Sign Up</div>

    <div>
        <button type="button" value="create page" onclick="log_page()" class="wrong">already have an account?<br>click here to log in</button>
    </div>
    <script type="text/JavaScript">
        function log_page() {window.location.href = "log.php";}
    </script>

    <div class="user">
        <p>Username:</p>
        <label>
            <input type="text" id="username" class="text">
        </label>
    </div>

    <div class="pass">
        <p>Password:</p>
        <label>
            <input type="text" id="password" class="text">
        </label>
    </div>

    <div>
        <button type="button" class="next">create account</button>
    </div>
</div>

</body>
</html>
