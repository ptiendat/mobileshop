<?php
    include_once("../connect.php");
    $id=$_GET['id'];
    $sql="DELETE FROM product WHERE prd_id='$id'";
    $query=mysqli_query($conn,$sql);
    header("location: index.php?page_layout=product");
?>