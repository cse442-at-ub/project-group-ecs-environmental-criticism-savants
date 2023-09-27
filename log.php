<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log In</title>
    <link rel="stylesheet" type="text/css" href="sign_log.css"/>
</head>
<body>
<div class="e64_10">
    <div  class="e60_6">Log In</div>
    <div class="e74_120">
        <button type="button" value="create page" onclick="sign_page()" class="e64_13">don't have an account?<br>click here to sign up</button>
    </div>
    <script type="text/JavaScript">

        function sign_page() {
            window.location.href = "sign.php";
        }
    </script>
    <div class=e74_99>
        <p>Username:</p>
        <input type="text" class="e64_16"></input>
    </div>

    <div class=e74_100>
        <p>Password:</p>
        <input type="text" class="e64_16"></input>
    </div>

    <div class=e74_116>
        <button type="button" class="e64_15">log in</button>
    </div>
</div>

</body>
</html>