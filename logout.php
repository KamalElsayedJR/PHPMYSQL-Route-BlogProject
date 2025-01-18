<?php
    session_start();
    $_SESSION["logged_in"] = FALSE; 
    unset($_SESSION["id"]);
    header("Location: index.php");

?>