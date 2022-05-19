<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Weather</title>
</head>
<?php
//Cookie based dark-mode system
    if(isset($_COOKIE["theme"]) == "dark" ){
        $backgroundcolor = "#1b1d1e";
        $color = "#fff";
    } 
    else{
        $backgroundcolor = "#f1f1f1";
        $color = "#1b1d1e";
    }
    error_reporting(E_ERROR | E_PARSE);
?>
<body style ="background-color: <?php echo $backgroundcolor;?>; color:<?php echo $color;?>">

<header>
<div>
            <h1 id="header">Crackman News</h1>
            <img class="globe" src="img/CClogo.png" alt="CClogo">
            <img class="globe" src="img/globe.png" alt="globe">
        </div>
        <hr>
        <div>
            <a class="titlebtn" href="index.php">Home</a>
            <a class="titlebtn" href="weather.php">Weather</a>
            <a class="titlebtn" href="profile.php">Profile</a>
            <a class="titlebtn" id="loginbtn" href="login.php">Login</a>
            <a class="titlebtn" id="loginbtn" href="register.php">Sign up</a>
            <label class="titlebtn" class="switch">
                Dark mode <input type="checkbox" id="toggleTheme" <?php  if($_COOKIE["theme"] == "dark" ){echo "checked";}?>>
            </label>
        </div>
        <hr>
    </header>

    <div id="mainpage">

        <!-- Showcase of weather data in Stockholm -->

        <div id="weatherbox">
            <div id="location"><h2 class="centertext">Stockholm</h2></div>
            <div id="squarebox">
                <div id="iconbox"><img id="icon" src="" alt="icon" class="center"></div>
                <div id="tempbox"><h1 class="centertext"><span id="temp" class="centertext"></span>°C</h1></div>
            </div>
            <div id="statbox">
                <div class="databox"> <h2>Min Temp:<span id="mintemp"></span>°C</h2> </div>
                <div class="databox"> <h2>Max Temp:<span id="maxtemp"></span>°C</h2> </div>
                <div class="databox"> <h2>Humidity:<span id="humidity"></span>%</h2> </div>
            </div>
    </div>



    <footer>
        <div class="footersegment">
            <h2 class="centertext">Logo name</h5>
            <hr>
            <h3 class="centertext"> Crackman Corporations &copy; <?php echo date ('Y'); ?></h6>
        </div>
        <div>
            <img src="img/CClogo.png" id="CClogo" alt="CClogo">
        </div>
        <div class="footersegment">
            <div id="Socialcenter">
                <a href="https://www.youtube.com/channel/UCMDcAkW1fWFJ2hAqzV_ywiA"><img class="Socialimg" src="img/youtube.png" alt="Youtube"></a>
                <a href="https://www.instagram.com/crackmancorporations/"><img class="Socialimg" src="img/instagram.png" alt="Instagram"></a>
                <a href="https://twitter.com/CrackmanM"><img class="Socialimg" src="img/twitter.png" alt="Twitter"></a>
                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><img class="Socialimg" src="img/facebook.png" alt="Facebook "></a>
            </div>
        </div>

    </footer>


    

    <script>

    //Fetches API key
    $.get('https://api.openweathermap.org/data/2.5/weather?q=Stockholm&appid=eacd9fd614793dd1bbdee11553553eb5&units=metric', function(data){
        //Takes data from API and creates variables 
        let temp = Math.floor(data.main.temp);
        let mintemp = Math.floor(data.main.temp_min);
        let maxtemp = Math.floor(data.main.temp_max);
        let humidity = Math.floor(data.main.humidity);
        let iconimg = "http://openweathermap.org/img/wn/" + data.weather[0].icon + ".png";
        //Implements the data from variables in the website ID's
        $("#temp").html(temp);
        $("#mintemp").html(mintemp);
        $("#maxtemp").html(maxtemp);
        $("#humidity").html(humidity);
        $("#icon").attr("src", iconimg);
    });

    //Creates function for turning dark-mode on and off 
    function myFunction() {
        var element = document.body;
        element.classList.toggle("dark-mode");

        var element2 = document.header;
        element2.classList.toggle("dark-mode");

}

</script>

<!-- Dark mode script -->
<script>
$("#toggleTheme").on('change', function() {
    if($(this).is(':checked')) {
        $(this).attr('value', 'true');
        document.cookie = "theme=dark";
        location.reload();
    } 
    else {
        $(this).attr('value', 'false');
        document.cookie = 'theme=; Max-Age=0';
        location.reload();
    }
});
</script>
</body>
</html>