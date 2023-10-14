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
        function sign_page() {window.location.href = "dashboard.php";}
    </script>
    <form name="form" action="dashboard.php" method="POST">
        <label>
            <input type="text" id="username" name="username" class="text" value="" placeholder="username">

            <input type="password" id="password" name="password" class="text" value="" placeholder="password">

            <input type="password" id="repassword" name="repassword" class="text" value="" placeholder="re-enter password">

            <input type="submit" class="next" value="log in">
        </label>
    </form>

</div>


</body>
</html>


