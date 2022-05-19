
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
    <title>Home</title>
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
<div id="bigdiv">

    <header>
        <!-- Navbar -->
        <div>
            <h1 id="header">Crackman News</h1>
            <img class="globe" src="img/CClogo.png" alt="CClogo">
            <img class="globe" src="img/globe.png" alt="globe">
        </div>
        <hr>
        <div>
            <!-- Navbar buttons -->
            <a class="titlebtn" href="index.php">Home</a>
            <a class="titlebtn" href="weather.php">Weather</a>
            <a class="titlebtn" href="profile.php">Profile</a>
            <a class="titlebtn" id="loginbtn" href="login.php">Login</a>
            <a class="titlebtn" id="loginbtn" href="register.php">Sign up</a>
            <!-- Cookie based Dark-mode button -->
            <label class="titlebtn" class="switch">
                Dark mode <input type="checkbox" id="toggleTheme" <?php  if($_COOKIE["theme"] == "dark" ){echo "checked";}?>>
            </label>
        </div>
        <hr>
    </header>

    <div id="mainpage">

        <!-- Article 1 -->
        <div class="arti">
            <div class="card" style="width: 30rem;">
                <img class="card-img-top" src="img/news1.webp" alt="News1" style="height: 20rem">
                <div class="card-body" style="height: 25rem;">
                    <h5 class="card-title" style="color: black">Researchers spot a rare type of dragonfish at 1,000 feet deep</h5>
                    <p class="card-text" style="color: black">Scientists in Monterey Bay, Calif., found a seldom-seen species of dragonfish swimming nearly 1,000 feet below the ocean's surface.</p>
                    <a href="https://www.npr.org/2022/05/07/1097443275/rare-type-of-dragonfish-california" class="btn btn-primary" style="color: black">Read article</a>
                </div>
            </div>
        </div>

        <!-- Article 2 -->
        <div class="arti">
            <div class="card" style="width: 30rem;">
                <img class="card-img-top" src="img/news2.webp" alt="News2" style="height: 20rem">
                <div class="card-body" style="height: 25rem;">
                    <h5 class="card-title" style="color: black">April Fools' Day might be the world's longest-running joke. No one knows how it began</h5>
                    <p class="card-text" style="color: black">The true history of April Fools' has been a mystery for ages. The theories around its origin story have involved everything from Roman gods and fake popes to the Gregorian calendar and gullible fish.</p>
                    <a href="https://www.npr.org/2022/04/01/1089947257/april-fools-day-history" class="btn btn-primary" style="color: black">Read article</a>
                </div>
            </div>
        </div>

        <!-- Article 3 -->
        <div class="arti">
            <div class="card" style="width: 30rem;">
                <img class="card-img-top" src="img/news3.webp" alt="News3" style="height: 20rem">
                <div class="card-body" style="height: 25rem;">
                    <h5 class="card-title" style="color: black">Two zebras who escaped from a Maryland farm are back after months on the run</h5>
                    <p class="card-text" style="color: black">The zebras had been on the loose since August 26. A third escapee was found dead in September. Officials are conducting an investigation of the zebras' owner.</p>
                    <a href="https://www.npr.org/2021/12/14/1064264486/two-zebras-who-escaped-from-a-maryland-farm-are-back-after-months-on-the-run" class="btn btn-primary" style="color: black">Read article</a>
                </div>
            </div>
        </div>

    </div>

    <!-- Footer -->
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
            <!-- Footer social media links -->
            <div id="Socialcenter">
                <a href="https://www.youtube.com/channel/UCMDcAkW1fWFJ2hAqzV_ywiA"><img class="Socialimg" src="img/youtube.png" alt="Youtube"></a>
                <a href="https://www.instagram.com/crackmancorporations/"><img class="Socialimg" src="img/instagram.png" alt="Instagram"></a>
                <a href="https://twitter.com/CrackmanM"><img class="Socialimg" src="img/twitter.png" alt="Twitter"></a>
                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><img class="Socialimg" src="img/facebook.png" alt="Facebook "></a>
            </div>
        </div>

    </footer>

</div>


<script src="script.js"></script>

<!-- Dark mode Script -->
<script>
    $("#toggleTheme").on('change', function() {
        if($(this).is(':checked')) {
            $(this).attr('value', 'true');
            document.cookie = "theme=dark";
            location.reload();
        } else {
            $(this).attr('value', 'false');
            document.cookie = 'theme=; Max-Age=0';
            location.reload();
        }
    });
</script>
</body>
</html>