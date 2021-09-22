<?php
    $id=$_GET['id'];
    session_start();
    if(isset($_SESSION['cart'][$id])){
        $_SESSION['cart'][$id]+=1;
    }else{
        $_SESSION['cart'][$id]=1;
    }
    header("location: ../../index.php?page_layout=cart");
?>