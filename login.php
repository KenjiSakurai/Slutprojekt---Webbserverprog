<?php

//Creates connection to database
$conn = mysqli_connect('localhost', 'root','', 'kont');

//Starts a session
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    //Compares input to database
    $sql = "SELECT * FROM register WHERE username = '$username' and password = '$pass'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if($count == 1){
        $_SESSION['username'] = "username";

        $_SESSION['login_user'] = $username;
    
        //When loggin in, redirects to profile page
        header("Location: profile.php");
        echo '
        <script type="text/javascript">;
            alert("message successfully sent");
        </script>';
    } 
    // Displays error message
    else{
        echo "Error: wrong username or pass";
    }

}

?>

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
    <title>Login</title>
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
            <!-- Navbar -->
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
            <!-- Cookie based navbar button-->
            <label class="titlebtn" class="switch">
                Dark mode <input type="checkbox" id="toggleTheme" <?php  if($_COOKIE["theme"] == "dark" ){echo "checked";}?>>
            </label>
        </div>
        <hr>
    </header>

    <div id="mainpage">

        <!-- Login form -->
        <form class="formbox" action="" method="post">
            <fieldset>
                <h2 class="login-text" style="color:black">Log In</h2>
                <input type="text" class="login-input" name="username" placeholder="Username" required />
                <input type="password" class="login-input" name="password" placeholder="Password" required>
                <input type="submit" name="submit" value="Log in" class="login-button">
                <p class="link" style="text-align: center"><a href="register.php" class="centertext">Click to Register</a></p>
            </fieldset>
        </form>

    </div>

    <footer>
        <!-- Footer -->
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


    

<script src="script.js"></script>

<!-- Dark mode script -->
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