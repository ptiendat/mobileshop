<?php
    session_start();
    if(isset($_SESSION['mail'])){
        session_destroy();
        header("location: index.php");
    }
?>