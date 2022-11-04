<?php 
session_start();
include '../../core/app.php';
include '../../core/validation.php';
include '../../core/database.php';
$errors = [];

if($_SERVER['REQUEST_METHOD'] == "POST"){

    // sanitize 
    $email = filter_var(sanitize($_POST['email']),FILTER_SANITIZE_EMAIL);
    $password = sanitize($_POST['password']);



    // email validation 

   

    if(val_required($email)){
        $errors[] = "email is required ";
    }elseif(val_email($email)){
        $errors[] = "please type an valid email";
    }



    if(val_required($password)){
        $errors[] = "password is required ";
    }elseif(val_min($password,3)){
        $errors[] = "password must be greater than 3 chars ";
    }elseif(val_max($password,20)){
        $errors[] = "password must be smaller than 20 chars ";
    }


    if(empty($errors)){
        // $password = password_hash($password,PASSWORD_DEFAULT);

        $sql = "SELECT * FROM `users` WHERE `email`='$email' ";
        $result = mysqli_query($conn,$sql);
        
        $num_rows = mysqli_num_rows($result);

        if(!$num_rows){
            $errors[] = "Email or password is not correct";
            $_SESSION['errors'] = $errors;
            header("location:".URL."login.php");
            die;
        }

        $row = mysqli_fetch_assoc($result);

        $verify = password_verify($password,$row['password']);
     

        if($verify){

            $_SESSION['auth'] = [
                "id"=>$row['id'],
                "name"=>$row['name'],
                "email"=>$email
            ];
            header("location:".URL."index.php");
            die;
            
        }else{
            $errors[] = "Email or password is not correct";
            $_SESSION['errors'] = $errors;
            header("location:".URL."login.php");
            die;
        }

        
        
    }else{
        $_SESSION['errors'] = $errors;
    }



    header("location:../../pages/users/add-user.php");


}