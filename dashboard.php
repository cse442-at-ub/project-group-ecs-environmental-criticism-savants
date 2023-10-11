<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Savant</title>
    <script src="dashboard.js"></script>
    <link rel="stylesheet" type="text/css" href="dash.css" />
</head>
<body onload="page_load()">
    <div class="banner">
        <p class="wel" id="user">Welcome back, </p>
    </div>

    <button type="button" onclick="disp(true)" class="back" id="log_out">Log Out</button>

    <div class="main" id="main">
        <div class="main_banner">
            <p class="view">Card View</p>
        </div>
        <div class="day" id="day"></div>
        <button type="button" class="button1" onclick="dayUpdate(-1)"><</button>
        <button type="button" class="button2" onclick="dayUpdate(1)">></button>
        <div id="cards"></div>
    </div>

    <div class="year">
        <div class="format">
            <div class="year_date" id="year"></div>
            <button type="button" class="button3" onclick="yearUpdate(-1)"><</button>
            <button type="button" class="button4" onclick="yearUpdate(1)">></button>
        </div>

        <div class="format">
            <button type="button" class="row1" id="Jan" onclick="monthUpdate('Jan')">Jan</button>
            <button type="button" class="row1" id="Feb" onclick="monthUpdate('Feb')">Feb</button>
            <button type="button" class="row2" id="Mar" onclick="monthUpdate('Mar')">Mar</button>
            <button type="button" class="row2" id="Apr" onclick="monthUpdate('Apr')">Apr</button>
            <button type="button" class="row3" id="May" onclick="monthUpdate('May')">May</button>
            <button type="button" class="row3" id="Jun" onclick="monthUpdate('Jun')">Jun</button>
            <button type="button" class="row4" id="Jul" onclick="monthUpdate('Jul')">Jul</button>
            <button type="button" class="row4" id="Aug" onclick="monthUpdate('Aug')">Aug</button>
            <button type="button" class="row5" id="Sep" onclick="monthUpdate('Sep')">Sep</button>
            <button type="button" class="row5" id="Oct" onclick="monthUpdate('Oct')">Oct</button>
            <button type="button" class="row6" id="Nov" onclick="monthUpdate('Nov')">Nov</button>
            <button type="button" class="row6" id="Dec" onclick="monthUpdate('Dec')">Dec</button>
        </div>

    </div>

    <div id="exit" class="pop" hidden="hidden">
        <p>Are you sure you want to log out?</p>
        <button type="button" onclick="disp(false)" class="opt">Cancel</button>
        <button type="button" onclick="log_out()" class="opt">Log Out</button>
    </div>

</body>
</html>