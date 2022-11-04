<?php 
session_start();
include '../core/app.php';
include ROOT_PATH.'core/database.php';

$errors = [];
$conn = mysqli_connect("localhost","root","","todoapp");
if(!$conn){
    echo "connect error " . mysqli_connect_error($conn);
}



if($_SERVER['REQUEST_METHOD']  == "POST" && isset($_POST['title'])){

    $title = trim(htmlspecialchars(htmlentities($_POST['title'])));

    // echo $title;

    if(strlen($title) < 3){
        $_SESSION['errors'] = "title of task must be greater than 3 chars "; 
    }


    if(empty($_SESSION['errors'])){
        $user_id = $_SESSION['auth']['id'];
        $sql = "INSERT INTO `tasks`(`title`,`user_id`) VALUES('$title','$user_id')";
        $result =  insert($sql); // mysqli_query($conn,$sql);
        // echo mysqli_affected_rows($conn);
        if(mysqli_affected_rows($conn) == 1){
            $_SESSION['success'] = "data inserted succefully";
        }
    }
    


    // redirection 
    header("location:".URL."pages/tasks/index.php");


}