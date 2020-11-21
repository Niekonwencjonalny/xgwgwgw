<?php

    session_start();

    if(!isset($_SESSION['loggedIn'])) {
        header('Location: index.php');
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Student Plus - najlepszy, najszybszy, darmowy dziennik elektorniczny!" />
    <link rel="icon" href="favicon.png">
    <title>StudentPlus - Dziennik</title>
</head>
<body>


	<?php
        echo "<b>Witaj</b> <i>" . $_SESSION['firstName'] . "</i> <a href='logout.php'>Wyloguj się</a><br/>";
        echo "<b>Twoje userID:</b> <i>" . $_SESSION['userID'] . "</i><br/>";
        echo "<b>ID twojej klasy to:</b> <i>" . $_SESSION['classID'] . "</i><br/>";
        echo "<b>ID twojej szkoly to:</b> <i>" . $_SESSION['schoolID'] . "</i><br/>";
        echo "<b>Twoj adres mailowy:</b> <i>" . $_SESSION['email'] . "</i><br/>";
        echo "<b>Data zalozenia konta:</b> <i>" . $_SESSION['accountCreationDate'] . "</i><br/>";

    ?>


</body>
</html>