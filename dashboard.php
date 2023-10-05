<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Savant</title>
    <link rel="stylesheet" type="text/css" href="dash.css"/>
</head>
<body>
    <div class="banner">
        <p class="wel">Welcome back, </p>
    </div>
    <button type="button" class="back">Log Out</button>

    <div class="main">
        <div class="main_banner">
            <p class="view">Card View</p>
        </div>
        <div class="day" id="day">Thursday, Nov 31</div>
        <button type="button" class="button1"><</button>
        <button type="button" class="button2">></button>
        <div id="cards"></div>
    </div>

    <div class="year">
        <div>
            <div class="year_date" id="year">2023</div>
            <button type="button" class="button3" onclick="year(-1)"><</button>
            <button type="button" class="button4" onclick="year(1)">></button>
        </div>

        <script type="text/javascript">
            function year(cur){
                const el = document.getElementById("year");
                el.innerHTML = parseInt(el.innerHTML) + cur
            }
        </script>

        <div>
            <button type="button" class="row1" id="jan" onclick="monthchange('jan')">Jan</button>
            <button type="button" class="row1" id="feb" onclick="monthchange('feb')">Feb</button>
            <button type="button" class="row2" id="mar" onclick="monthchange('mar')">Mar</button>
            <button type="button" class="row2" id="apr" onclick="monthchange('apr')">Apr</button>
            <button type="button" class="row3" id="may" onclick="monthchange('may')">May</button>
            <button type="button" class="row3" id="jun" onclick="monthchange('jun')">Jun</button>
            <button type="button" class="row4" id="jul" onclick="monthchange('jul')">Jul</button>
            <button type="button" class="row4" id="aug" onclick="monthchange('aug')">Aug</button>
            <button type="button" class="row5" id="sep" onclick="monthchange('sep')">Sep</button>
            <button type="button" class="row5" id="oct" onclick="monthchange('oct')">Oct</button>
            <button type="button" class="row6" id="nov" onclick="monthchange('nov')">Nov</button>
            <button type="button" class="row6" id="dec" onclick="monthchange('dec')">Dec</button>
        </div>
        <script type="text/javascript">
            function monthchange(cur){
            }
        </script>

    </div>
</body>
</html>