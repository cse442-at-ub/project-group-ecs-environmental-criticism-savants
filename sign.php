<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <script src="registering.js"></script>
    <link rel="stylesheet" type="text/css" href="sign_log.css"/>
</head>
<body>
<div class="banner"></div>
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
        <button type="button" class="next" onclick="sign()">create account</button>
    </div>

    <div id="pop-up" class="pop-up" hidden="hidden">
        <div class="pop-text" id="dash" hidden="hidden">Click below to navigate to your dashboard</div>
        <button type="button" id="dash-button" class="pop" hidden="hidden" onclick="nav()">Dashboard</button>
        <script type="text/javascript">
            function nav(){window.location.href = "dashboard.php";}
        </script>
        <div class="pop-text" id="bad-name" hidden="hidden">Username is already in use</div>
        <div class="pop-text" id="bad-pass" hidden="hidden">Password was incorrect<br> must have no spaces and be at least 8 characters long</div>
        <button type="button" id="bad-button" class="pop" hidden="hidden" onclick="hide()">Retry</button>

    </div>

</div>

</body>
</html>
