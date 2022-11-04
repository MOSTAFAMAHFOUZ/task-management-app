<?php 
session_start();
include '../core/app.php';
include ROOT_PATH.'core/database.php';


if(isset($_GET['id'])){
    $conn = mysqli_connect("localhost","root","","todoapp");
    if(!$conn){
        $_SESSION['errors']=  "connect error " . mysqli_connect_error($conn);
    }
    
    $id = $_GET['id'];
    $result = getRow('tasks',$id);
    $row = mysqli_fetch_row($result);
  
    if(!$row){
        $_SESSION['errors'] = "data not exists";
    }else{
        $result = delete('tasks',$id);
        $_SESSION['success'] = "data deleted succesfully";

    }




    // redirection 
    header("location:".URL."pages/tasks/index.php");
}