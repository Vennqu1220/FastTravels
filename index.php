<!DOCTYPE html>
<html lang="PL-pl">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>FastTravels - Podróże na Last Minute</title>
	<link rel="stylesheet" type="text/css" href="mainstyle.css">
	<link rel="icon" href="favicon/logo.png">
	<!--google fonts-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>
<?php
    $conn = mysqli_connect("localhost","root","","fasttravels");
	session_start();
?>
<body>
	<div class="mainview">
		<header>
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
			<div class="fronttext">
				<h1>Zaplanuj Urlop z Nami</h1>
				<p>To tutaj możesz znaleźć wymarzone wakacje. Fast Travels oferuje mase miejsc, w które możesz podróżować bez stresu i zmartwień</p>
				<a href="login.php"><button class="frontbtn"><b>Dołącz do nas</b></button></a>
			</div>
	</div>
	</header>
	<main>
		<h2>Najczęściej odwiedzane kraje przez naszych klientów</h2>
			<div class="plates">
		<span class="plate">
			<img src="img\plate1.jpg" alt="Francja">
			<h3>Francja</h3>
			<p>Wieża Eiffla</p>
		</span>
		<span class="plate">
			<img src="img\plate2.jpg" alt="Hiszpania">
			<h3>Hiszpania</h3>
			<p>Alhambra</p>
		</span>
		<span class="plate">
			<img src="img\plate3.jpg" alt="Włochy">
			<h3>Włochy</h3>
			<p>Koloseum</p>
		</span>
			</div>
			<button id="bookingbtn">Zarezerwuj lot</button>
	</main>
	<footer>
		<span class="info"> 
			<p>FastTravels</p>
			<ul>
				<li>Regulamin</li>
				<li>Centrum Obsługi</li>
				<li>Pomoc</li>
				<li>O Firmie</li>
				<li>Jak rezerwować</li>
			</ul>
		</span>
		<span class="info">
			<p>Współpraca</p>
			<ul>
				<li>Partnerzy</li>
				<li>Franczyza</li>
			</ul>
		</span>
		<span class="info">
			<p>Dla Klientów</p>
			<ul>
				<li>Bony Turystyczne</li>
				<li>Ubezpieczenia</li>
				<li>Pogoda</li>
				<li>Transport</li>
			</ul>
		</span>
		<span class="info">
			<p>Kontakt</p>
			<ul>
				<li>FastTravels S.A</li>
				<li>Ul. Staszica 1</li>
				<li>09-530 Gąbin</li>
				<li>Tel: 517 487 999</li>
			</ul>
		</span>
	</footer>
</body>
</html>
