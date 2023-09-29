<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="sign_log.css"/>
</head>
<body>
<div class="box"></div>
<div class="e64_10">
    <div  class="e60_6">Sign Up</div>
    <div class="e74_120">
        <button type="button" value="create page" onclick="log_page()" class="e64_13">already have an account?<br>click here to log in</button>
    </div>
    <script type="text/JavaScript"> 

        function log_page() {
            window.location.href = "log.php";
        }
    </script>
    <div class=e74_99>
        <p>Username:</p>
        <label>
            <input type="text" class="e64_16">
        </label>
    </div>

    <div class=e74_100>
        <p>Password:</p>
        <label>
            <input type="text" class="e64_16">
        </label>
    </div>

    <div class=e74_116>
        <button type="button" class="e64_15">create account</button>
    </div>
</div>

</body>
</html>
