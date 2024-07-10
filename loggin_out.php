<?php
    session_start();
    $_SESSION['loggedin'] = false;
    $_SESSION['clients'] = null;
    $_SESSION['suppliers'] = null;
    $_SESSION['products'] = null;
    session_destroy();

    header('Location: ./index.php');
?>