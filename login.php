<?php
/* Kod należy do użytkownika UnConv, zakaz kopiowania i używania bez pozwolenia! */       
        
        session_start(); #Rozpoczęcie sesji

        if((!isset($_POST['username'])) || (!isset($_POST['password']))) {
            header('Location: index.php');
            exit();
        }

        require_once "connection.php";

        $dbconnection = @new mysqli($host, $db_user, $db_password, $db_name); #Polaczenie z baza danych oparte na pliku connection.php
        
        if ($dbconnection->connect_errno!=0) {
            echo "Error: ".$polaczenie->connect_errno; #Wyrzuci kod bledu w razie jego wystapienia
        }
        else {
            $login = $_POST['username'];
            $pass = $_POST['password'];

            $login = htmlentities($login, ENT_QUOTES, "utf-8");
            $pass = htmlentities($pass, ENT_QUOTES, "utf-8");

            $sql = "SELECT * FROM users WHERE username='$login' AND password='$pass'"; #Wyszukiwanie usera w bazie danych z podanym loginem i haslem

            if($sqlResult = @$dbconnection->query(sprintf("SELECT * FROM users WHERE username='%s' AND password='%s'", mysqli_real_escape_string($dbconnection,$login),mysqli_real_escape_string($dbconnection,$pass)))) {
                $records = $sqlResult->num_rows; #Przechwytywanie ilosci kolumn (jesli jest 1 uzytkownik istnieje)
                if($records==1) {
                    $searchResults = $sqlResult->fetch_assoc(); #Tablica przechowujaca wartosci z kolumn
                    $_SESSION['loggedIn'] = true;
                    $_SESSION['userID'] = $searchResults['userID'];
                    $_SESSION['username'] = $searchResults['username']; #Zapisanie nazwy uzytkownika do zmiennej
                    $_SESSION['password'] = $searchResults['password']; #Zapisanie hasla do zmiennej
                    $_SESSION['firstName'] = $searchResults['firstName'];
                    $_SESSION['lastName'] = $searchResults['lastName'];
                    $_SESSION['email'] = $searchResults['email'];
                    $_SESSION['schoolID'] = $searchResults['schoolID'];
                    $_SESSION['classID'] = $searchResults['classID'];
                    $_SESSION['accountCreationDate'] = $searchResults['accountCreationDate'];

                    unset($_SESSION['error']); #Usuniecie zmiennej o bledzie w logowaniu; nie jest potrzebna
                    $sqlResult->free_result(); #Czyszczenie pamieci w SQL

                    header('Location: dziennik.php'); #Przekierowanie do dziennika
                } else {
                    $_SESSION['error'] = '<span style="color:red">Nieprawidłowy login lub hasło</span>'; #Nie znaleziono takiego użytkownika w bazie danych
                    header('Location: index.php');
                }
            }

            $dbconnection->close();
        }
?>