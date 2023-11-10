<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="sign_log.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="banner"></div>
<div class="main">
    <div  class="title">Sign Up</div>
    <div>
        <button type="button" value="create page" onclick="log_page()" class="wrong">Already have an account?<br>Click here to log in!</button>
    </div>
    <script type="text/JavaScript">
        function log_page() {window.location.href = "log.php";}
    </script>

    <form name="form" action="mid.php" method="POST">
        <label id="there">
            <input type="text" id="username" name="username" class="text-1" value="" placeholder="Username" required>

            <input type="password" id="password" name="password" class="text-2" value="" placeholder="Password" required>

            <input type="password" id="repassword" name="repassword" class="text-3" value="" placeholder="Re-enter Password" required>

            <input type="text" value="sign" id="here" name="here" hidden="hidden">

            <input type="submit" class="next" value="Create Account" onclick="sign()">
        </label>
    </form>

</div>

</body>
</html>
