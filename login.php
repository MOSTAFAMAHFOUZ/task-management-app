<?php session_start(); ?>
<?php include 'core/app.php'; ?>
<?php include ROOT_PATH.'core/database.php'; ?>

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
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto my-5">
                <h1 class="text-center">Login</h1>
            </div>
            <div class="col-8 mx-auto">
                <?php if(isset($_SESSION['errors'])): ?>
                    <?php foreach($_SESSION['errors'] as $error): ?>
                            <div class="alert alert-danger text-center"><?php echo $error; ?></div>
                    <?php endforeach; ?>
                    <?php unset($_SESSION['errors']); ?>
                <?php endif; ?>

                <?php if(isset($_SESSION['success'])): ?>
                        <div class="alert alert-success text-center"><?php echo $_SESSION['success']; ?></div>
                <?php unset($_SESSION['success']); ?>
                <?php endif; ?>



                <form action="<?php echo URL."handelers/users/login.php"; ?>" method="post" class="border p-2">
                    <input type="text" name="email" class="form-control my-3" placeholder="type your email">
                    <input type="password" name="password" class="form-control my-3" placeholder="type your password">
                    <input type="submit"  class="form-control my-3 btn btn-success" value="Login">
                </form>
            </div>
        </div>
    </div>

<?php include ROOT_PATH.'inc/footer.php'; ?>