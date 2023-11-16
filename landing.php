<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Savant</title>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link rel="stylesheet" type="text/css" href="landing.css"/>
</head>
<body>
    <div class="banner"></div>

    <div class="wel">Welcome to Savant</div>

    <div class="side-box">
       <span  class="intro">Savant is an excellent tool to help:</span>
        <ol  class="list">
            <li> Organize events </li>
            <li> Keep track of school work </li>
            <li>Keep track of birthday, anniversaries and other special events </li>
        </ol>
    </div>

    <div>
        <button type="button" value="create page" onclick="sign_page()" class="create"> Click here to create an account </button>
    </div>

    <script type="text/JavaScript">
        function sign_page() {window.location.href = "sign.php";}
    </script>

    <div>
        <button type="button" value="create page" onclick="log_page()" class="log">Click here to log in to an account </button>
    </div>

    <script type="text/JavaScript">
        function log_page() {window.location.href = "log.php";}
    </script>
</body>
</html>