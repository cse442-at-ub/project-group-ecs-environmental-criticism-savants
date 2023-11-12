<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Log In</title>
    <script src="registering.js"></script>
    <link rel="stylesheet" type="text/css" href="sign_log.css"/>
</head>
<body>
<div class="banner"> </div>
<div class="main">
    <div  class="title">Log In</div>

    <div>
        <button type="button" onclick="nav('sign.php')" class="wrong">Don't have an account?<br>Click here to sign up!</button>
    </div>


    <form name="form" action="mid.php" method="POST">
        <label>
            <input type="text" id="username" name="username" class="text-4" value="" placeholder="Username" required>

            <input type="password" id="password" name="password" class="text-5" value="" placeholder="Password" required>

            <input type="text" value="log" id="here" name="here" hidden="hidden">

            <input type="submit" class="next" value="Log In">
        </label>
    </form>


</div>
</body>
</html>