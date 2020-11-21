<?php
    session_start();

    if(isset($_POST['schoolID'])){
        $allDone = true;
        $username = $_POST['username'];
        if((strlen($username)<5) || (strlen($username)>20)){
            $allDone = false;
            $_SESSION['username_error'] = "Nazwa użytkownika musi mieć od 5 do 20 znaków!";
        }

        if($allDone == true) {
            //Wszystko działa
            echo "Udana walidacja";
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Student Plus - najlepszy, najszybszy, darmowy dziennik elektorniczny!" />
    <link rel="icon" href="favicon.png">
    <link rel="stylesheet" href="/styles/style_registerLogin.css" type="text/css" />
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <title>StudentPlus - Rejestracja</title>
</head>
<body>

    <a href="index.php">Zaloguj się!</a>

    <form method="post">
    
        Imię: <br /> <input type="text" name="firstName" /> <br /><br />
        Nazwisko: <br /> <input type="text" name="lastName" /> <br /><br />
        Adres email: <br /> <input type="mail" name="email" /> <br /><br />
        ID szkoly: <br /> <input type="text" name="schoolID" /> <br /><br />
        ID klasy: <br /> <input type="text" name="classID" /> <br /><br />
        Nazwa użytkownika: <br /> <input type="text" name="username" /> <br /><br />
        <?php if(isset($_SESSION['username_error'])){
            echo "<div class='error'>".$_SESSION['username_error']."</div>";
        } ?>
        Hasło: <br /> <input type="password" name="password" /> <br /><br />
        Powtórz hasło: <br /> <input type="password" name="password2" /> <br /><br />
        <label><input type="checkbox" name="regulations" /> Akceptuję <a href="regulations.php">regulamin</a></label><br />
        <div class="g-recaptcha" data-sitekey="6Ld269wZAAAAAC4sQL3tYy-kT4WmZxoeGyTv_kAk"></div><br />
        <input type="submit" value="Zarejestruj się" />

    </form>
</body>
</html>