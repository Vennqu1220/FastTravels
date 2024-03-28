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
                        echo '<a href="logout.php"><div class="logoutbtndiv">Wyloguj się</a></div>';
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
        <!-- Skrypt sprawdzający czy jesteśmy zalogowani jesli tak to zamiast <a> jest nasza nazwa uzytkownika-->
            <li><div class="loginbtn">
                    <?php
                    if ($_SESSION['zalogowany'] = true) {
                        if (empty($_SESSION['login'])) {
                        echo '<a href="login.php">Zaloguj się</a>';
                            
                        }else{
                        echo '<a href="profil.php">'.$_SESSION['login'].'</a>'; 
                        }
                    }
                    ?>
            </div></li>
                </ul>
            </nav>
            </div>
        <div class="register_content">

            <h1>LOGOWANIE</h1>
            <div class="form_register">
            <form action="login.php" method="post">
                <label>Nazwa Użytkownika </label><br>
                <input type="text" name="username" class="logintext" placeholder="Wpisz Nazwę Użytkownika"><br>
                                
                <label>Hasło </label><br>
                <input type="password" name="password" class="logintext" placeholder="Podaj Hasło"><br>

                <br><input type="submit" class="submitbtn" name="loguj" value="Zaloguj się">
                
            </form>
<?php
    function filtruj($zmienna)
    {
            $zmienna = stripslashes($zmienna);

            return htmlspecialchars(trim($zmienna));
    }    
    if (isset($_POST['loguj']))
    {
        $login = filtruj($_POST['username']);
        $haslo = filtruj($_POST['password']);
        
        if (mysqli_num_rows(mysqli_query($conn, "SELECT nazwa, haslo FROM konta WHERE nazwa = '".$login."' AND haslo = '".md5($haslo)."';")) > 0)
        {
            
            $_SESSION['login'] = $login;
            $_SESSION['zalogowany'] = true;
            
            header("location: index.php");
        }
        else echo "<h3>Wpisano złe dane.</h3>";
    }
?>
            <p>Nie posiadasz konta? <a href="register.php">Zarejestruj się</a>.</p>
            </div>
        </div>
    </div>
</body>
</html>