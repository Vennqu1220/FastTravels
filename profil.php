<!DOCTYPE html>
<html lang="PL-pl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FastTravels - Zarejestruj się</title>
    <link rel="stylesheet" type="text/css" href="mainstyle.css">
    <link rel="icon" href="favicon/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","fasttravels");
?>
<body>
    <div class="mainview">
        <div class="navbar">
                <img src="favicon/logo.png" class="logo">
                        <?php
                    if ($_SESSION['zalogowany'] = true) {
                        if (empty($_SESSION['login'])) {
                        }else{
                        echo '<a href="logout.php"><div class="logouticon"><svg fill="none" height="40" viewBox="0 0 24 24" width="40" xmlns="http://www.w3.org/2000/svg"><g stroke="#141414" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="m15.75 8.75 3.5 3.25-3.5 3.25"/><path d="m19 12h-8.25"/><path d="m15.25 4.75h-8.5c-1.10457 0-2 .89543-2 2v10.5c0 1.1046.89543 2 2 2h8.5"/></g></svg></div><div class="logoutbtndiv">Wyloguj się</a></div>';
                        }
                    }
                    ?>
            <nav>
                <ul>
                    <li><a href="index.php">Strona Główna</a></li>
                    <li><a href="index.php">Rezerwacje</a></li>
                    <!-- skrypt jeżeli użytkownik nie jest zalogowany to przenosi do strony login.php jesli jest zalogowany przenosi do strony rezerwacje.php-->
                    <li><a href="index.php">Last Minute</a></li><!-- skrypt który sprawdza z bazy danych loty które odbędą się w ciągu 7 dni-->
                    <li><a href="index.php">Opinie</a></li>
                    <!-- skrypt jeżeli użytkownik nie jest zalogowany to przenosi do strony opinie ale w miejscu dodania opinni wydnieje napis że aby dodać opinie musisz sie zalogować a jesli jest zalogowany wyskakuje pole tekstowe z możliwością dodania opinii-->
                </ul>
            </nav>
                <div class="loginbtn">
                    <?php
                    if ($_SESSION['zalogowany'] = true) {
                        if (empty($_SESSION['login'])) {
                        echo '<a href="login.php">Zaloguj się</a>';
                            
                        }else{
                        echo '<a href="profil.php">'.$_SESSION['login'].'</a>'; 
                        }
                    }
                    ?>
            </div>
            </div>
        <div class="profilereview">

            <h1>Twój Profil: <?php
                echo $_SESSION['login'];
            ?></h1>

            
        </div>
    </div>
</body>
</html>