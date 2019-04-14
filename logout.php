<?php 
    include_once "config/core.php";

    if(!isset($_SESSION['designation'])){
        header("Location: index.php");
    }
    
    
    unset($_SESSION["designation"]);
    unset($_SESSION["user_name"]);
    session_destroy();
    header("Location: index.php");

?>
