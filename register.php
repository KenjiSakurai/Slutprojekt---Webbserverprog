<?php

//Creates connection to database
$conn = mysqli_connect('localhost', 'root','', 'kont');

//Executes code when pressing 'submit'
if(isset($_POST['submit']))
{
    //Takes input from textfields and puts them in the database
    $fullname = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    //Sorts data into right section
    $sql = "INSERT INTO register(name, username, email, password) VALUES ('$fullname', '$username', '$email', '$pass')";

    //If the account was created successfully, runs code and redirects to login page
    if(mysqli_query($conn, $sql)){
        echo "Account created successfully.";
        header("Location: login.php");
    } 
    else{
        //Showcases error
        echo "Error: $sql.".mysqli_error($conn);
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
    <title>Register</title>
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

<!-- Navbar -->
<header>
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
            <!-- Cookie based dark-mode button -->
            <label class="titlebtn" class="switch">
                Dark mode <input type="checkbox" id="toggleTheme" <?php  if($_COOKIE["theme"] == "dark" ){echo "checked";}?>>
            </label>
        </div>
        <hr>
    </header>

    <div id="mainpage">

        <!-- Sign up form -->
        <form class="formbox" action="" method="post">
                <fieldset>
                <h2 class="login-text" style="color:black">Register</h2>
                <input type="text" class="login-input" name="name" placeholder="Full name" required />
                <input type="text" class="login-input" name="username" placeholder="Username" required />
                <input type="email" class="login-input" name="email" placeholder="Email Adress">
                <input type="password" class="login-input" name="password" placeholder="Password">
                <input type="password" class="login-input" name="repassword" placeholder="Repeat Password">
                <input type="submit" name="submit" value="Register" class="login-button">
                <p class="link" style="text-align: center"><a href="login.php" class="centertext">Click to Login</a></p>
                </fieldset>
        </form>

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