<?php 
session_start();
include '../../core/database.php';

if(isset($_GET['id'])){

    // be sure - exists in database 
    // id - numeric 

    $id = $_GET['id'];
    $sql = "DELETE FROM `users` WHERE `id` = $id";
    $result = mysqli_query($conn,$sql);
    $_SESSION['success'] = "data deleted successfully";
}


header("location:../../pages/users/index.php");

