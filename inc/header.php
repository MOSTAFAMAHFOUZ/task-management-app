<?php 

    if(!isset($_SESSION['auth'])){
        header("location:".URL."login.php");
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Document</title>
</head>

<body>

    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">TODO</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php if(isset($_SESSION['auth'])): ?>
            <ul class="navbar-nav mr-auto">

                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo URL ."pages/tasks/index.php"; ?>">Tasks <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL ."pages/users/add-user.php"; ?>">Add User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL ."pages/users/index.php"; ?>">All Users</a>
                </li>
            </ul>
        <?php endif; ?>
            <ul class="navbar-nav ml-auto">
            <?php if(isset($_SESSION['auth'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL ."pages/users/profile.php"; ?>">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL ."logout.php"; ?>">Logout</a>
                </li>
            <?php else:?>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL ."register.php"; ?>">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL ."login.php"; ?>">Login</a>
                </li>
                <?php endif; ?>

            </ul>

        </div>
    </nav>
    