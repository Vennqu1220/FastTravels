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

            <h1>REJESTRACJA</h1>
            <div class="form_register">
            <form action="register.php" method="post">
                <label>Nazwa Użytkownika </label><br>
                <input type="text" name="username" class="logintext" placeholder="Wpisz Nazwę Użytkownika"><br><br>
            
                <label>Hasło </label><br>
                <input type="password" name="password" class="logintext" placeholder="Podaj Hasło"><br>
                

                <label>Potwierdź Hasło </label><br>
                <input type="password" name="confirm_password" class="logintext" placeholder="Potwierdź Hasło"><br><br>
                    
                <label>E-mail</label><br>
                <input type="text" name="email" class="logintext" placeholder="Podaj E-mail"><br>   

                <label>Numer Telefonu</label><br>
                <input type="number" name="nr_tel" class="logintext" placeholder="Podaj Numer Telefonu"><br>

                <br><input type="submit" class="submitbtn" name="zarejestruj" value="Zarejestruj">

            </form>
            Posiadasz już konto? <a href="login.php">Zaloguj się</a>.</p>
            </div>
<?php
    $conn = mysqli_connect("localhost","root","","fasttravels");
    
    function filtruj($zmienna)
    {
            $zmienna = stripslashes($zmienna);

            return htmlspecialchars(trim($zmienna));
    }
    
    if (isset($_POST['zarejestruj']))
    {
        $login = filtruj($_POST['username']);
        $haslo1 = filtruj($_POST['password']);
        $haslo2 = filtruj($_POST['confirm_password']);
        $email = filtruj($_POST['email']);
        $nr_tel = filtruj($_POST['nr_tel']);

        

        if (mysqli_num_rows(mysqli_query($conn, "SELECT nazwa FROM konta WHERE nazwa = '".$login."';")) == 0)
        {
            if ($haslo1 == $haslo2)
            {
                mysqli_query($conn, "INSERT INTO `konta` (`nazwa`, `haslo`, `e_mail`, `nr_telefonu`) VALUES ('".$login."', '".md5($haslo1)."', '".$email."', '".$nr_tel."')");
                
                header("location: login.php");
            }
            else {
                echo "Hasła nie są takie same";
            }
        }
        else {
            echo "Podana nazwa jest już zajęta.";
        }
    }
?>
        </div>
    </div>
</body>
</html>