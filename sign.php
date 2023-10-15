<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
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

    <form name="form" action="mid.php" method="POST">
        <label id="there">
            <input type="text" id="username" name="username" class="text" value="" placeholder="username" required>

            <input type="password" id="password" name="password" class="text" value="" placeholder="password" required>

            <input type="password" id="repassword" name="repassword" class="text" value="" placeholder="re-enter password" required>

            <input type="text" value="sign" id="here" name="here" hidden="hidden">

            <input type="submit" class="next" value="create account" onclick="sign()">
        </label>
    </form>

</div>

</body>
</html>
