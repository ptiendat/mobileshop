<?php
    include_once("../connect.php");
    $id=$_GET['id'];
    $sql="DELETE FROM user WHERE user_id='$id'";
    $query=mysqli_query($conn,$sql);
    header("location: index.php?page_layout=user");
?>