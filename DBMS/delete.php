<?php
include 'connect.php';
    $id = $_GET['deleteid'];
    $sql = "DELETE FROM `seriescrud` WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('location:read.php');

    }else{
        die(mysqli_error($conn));
    }


?>
