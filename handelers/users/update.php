<?php 
session_start();
include '../../core/validation.php';
include '../../core/database.php';
$errors = [];

if($_SERVER['REQUEST_METHOD'] == "POST"){

    if(!isset($_GET['id'])){
        header("location:index.php");
        die;
    }
    $id = $_GET['id'];
    // sanitize 
    $name = sanitize($_POST['name']);
    $email = filter_var(sanitize($_POST['email']),FILTER_SANITIZE_EMAIL);
    $password = sanitize($_POST['password']);

  
    // validation
    // name  -> 3 , max 20 , required 

    if(val_required($name)){
        $errors[] = "name is required ";
    }elseif(val_min($name,3)){
        $errors[] = "name must be greater than 3 chars ";
    }elseif(val_max($name,20)){
        $errors[] = "name must be smaller than 20 chars ";
    }elseif(!preg_match("/^[a-z A-Z]+$/",$name)){
        $errors[] = "please type a valid string ";
    }



    // email validation 

   

    if(val_required($email)){
        $errors[] = "email is required ";
    }elseif(val_email($email)){
        $errors[] = "please type an valid email";
    }



    if(isset($_POST['password'])  && $_POST['password'] !=''){
        if(val_required($password)){
            $errors[] = "password is required ";
        }elseif(val_min($password,3)){
            $errors[] = "password must be greater than 3 chars ";
        }elseif(val_max($password,20)){
            $errors[] = "password must be smaller than 20 chars ";
        }
    }
    


    if(empty($errors)){
        
        $password = password_hash($password,PASSWORD_DEFAULT);

        if($password){
            $sql = "UPDATE `users` SET `name`='$name' , `email`='$email' , `password`='$password' WHERE `id`=$id ";
        }else{
            $sql = "UPDATE `users` SET `name`='$name' , `email`='$email' WHERE `id`=$id ";
        }

        $result = mysqli_query($conn,$sql);
        if($result){
            $_SESSION['success'] = "data updated successfully";
        }
        
    }else{
        $_SESSION['errors'] = $errors;
    }



    header("location:../../pages/users/edit-user.php?id=".$_GET['id']);


}