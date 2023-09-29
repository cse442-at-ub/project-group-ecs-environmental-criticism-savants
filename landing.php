<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Savant</title>
    <link rel="stylesheet" type="text/css" href="landing.css"/>
</head>
<body>
<div class=e64_42>
    <div class="box">
    </div>
    <span  class="e64_44">Welcome to Savant</span>
    <div class=e68_85>
        <div class="e64_45"></div><span  class="e64_48">Savant is an excellent tool to help:</span>
        <ol  class="e64_50">
            <li> Organize events </li>
            <li> Keep track of school work </li>
            <li>Keep track of birthday, anniversaries and other special events </li>
        </ol>
    </div>
    <div class=e68_86>
        <button type="button" value="create page" onclick="sign_page()" class="e64_77"> Click here to create an account </button>
    </div>
    <script type="text/JavaScript">

        function sign_page() {
            window.location.href = "sign.php";
        }
    </script>
    <div class=e68_87>

        <button type="button" value="create page" onclick="log_page()" class="e64_77">Click here to log in to an account </button>
    </div>
    <script type="text/JavaScript">

        function log_page() {
            window.location.href = "log.php";
        }
    </script>
</div>
</body>
</html>