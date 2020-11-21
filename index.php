<?php
    session_start();

    if((isset($_SESSION['loggedIn'])) && ($_SESSION['loggedIn'] == true)) { #Sprawdzamy czy uzytkownik nie jest juz zalogowany
        header('Location: dziennik.php'); #Jesli jest to przekierowujemy do dziennik.php
        exit(); #Nie wykonujemy pliku dalej
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Student Plus - najlepszy, najszybszy, darmowy dziennik elektorniczny!" />
    <link rel="icon" href="favicon.png">
    <title>StudentPlus - Strona Główna</title>
</head>
<body>

    <a href="register.php">Zarejestruj się!</a>

    <form action="login.php" method="post">
	
        Login: <br /> <input type="text" name="username" /> <br />
        Hasło: <br /> <input type="password" name="password" /> <br /><br />
        <input type="submit" value="Zaloguj się" />

    </form>
    <?php
        if(isset($_SESSION['error'])) {
            echo $_SESSION['error'];
        }
    ?>


</body>
</html>