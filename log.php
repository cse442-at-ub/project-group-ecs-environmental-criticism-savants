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
        <button type="button" onclick="nav('sign.php')" class="wrong">don't have an account?<br>click here to sign up</button>
    </div>


    <form name="form" action="mid.php" method="POST">
        <label>
            <input type="text" id="username" name="username" class="text-1" value="" placeholder="username" required>

            <input type="password" id="password" name="password" class="text-1" value="" placeholder="password" required>

            <input type="text" value="log" id="here" name="here" hidden="hidden">

            <input type="submit" class="next" value="log in">
        </label>
    </form>

</div>
</body>
</html>


