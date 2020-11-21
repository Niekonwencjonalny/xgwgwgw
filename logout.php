<?php
    session_start();
    session_unset(); #"Niszczy" sesję
    header('Location: index.php');

?>