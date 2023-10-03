<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log In</title>
    <link rel="stylesheet" type="text/css" href="sign_log_dark.css" id="style"/>

</head>
<body>
<div class="banner"> </div>
<div>
    <button class ="switch" type="button" onclick= "swap('dark')" id ="dark">Dark Mode</button>
    <button hidden="hidden" class ="switch" type="button" onclick= "swap('light')" id ='light'>Light Mode</button>
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

    swap(localStorage.getItem('mode'))
</script>
<div class="main">
    <div  class="title">Log In</div>

    <div>
        <button type="button" value="create page" onclick="sign_page()" class="wrong">don't have an account?<br>click here to sign up</button>
    </div>
    <script type="text/JavaScript">
        function sign_page() {window.location.href = "sign.php";}
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
        <button type="button" class="next">log in</button>
    </div>
</div>

</body>
</html>