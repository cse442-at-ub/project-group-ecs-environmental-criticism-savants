<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log In</title>
    <script src="registering.js"></script>
    <link rel="stylesheet" type="text/css" href="sign_log.css"/>
</head>
<body>
<div class="banner"> </div>
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
        <button type="button" class="next" onclick="log()">log in</button>
    </div>

    <div id="pop-up" class="pop-up" hidden="hidden">
        <div class="pop-text" id="dash" hidden="hidden">You have been logged in <br><br> click below to navigate to your dashboard</div>
        <button type="button" id="dash-button" class="pop" hidden="hidden" onclick="nav()">Dashboard</button>
        <script type="text/javascript">
            function nav(){window.location.href = "dashboard.php";}
        </script>
        <div class="pop-text" id="bad" hidden="hidden"><br>Username or Password was incorrect</div>
        <button type="button" id="bad-button" class="pop" hidden="hidden" onclick="hide()">Retry</button>

    </div>
</div>


</body>
</html>