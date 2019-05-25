<?php 
    session_start();

echo <<<_INIT
<!DOCTYPE html>
    <html>
        <head>
            <meta charset='utf-8'>
            <meta name='viewport' conent='width=device-width, initial-scale=1'>
            <link rel='stylesheet' href='jquery.mobile-1.4.5.min.css'>
            <link rel='stylesheet' href='style.css'>
            <script src='javascript.js'></script>
            <script src='jquery-2.2.4.min.js'></script>
            <script src='jquery.mobile-1.4.5.min.js'></script>

_INIT;

    require_once 'functions.php';

    $userstr = 'Welcome Guest';

    if(isset($_SESSION['user'])) {
        $user     = $_SESSION['user'];
        $loggedin = TRUE;
        $userstr  = "Logged in as: $user";
    }
    else $loggedin = FALSE;