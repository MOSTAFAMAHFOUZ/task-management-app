<?php session_start();
?>
<?php include '../../core/app.php'; ?>
<?php 
    include ROOT_PATH.'core/database.php';
    if(!isset($_GET['id'])){
        header("location:index.php");
        die;
    }


    $id = (int) $_GET['id'];
    
    $result = getRow('users',$id);

    $num_rows = mysqli_num_rows($result);

    if(!$num_rows){
        header("location:index.php");
        die;
    }

    $row = mysqli_fetch_assoc($result);
    




?>
<?php include ROOT_PATH.'inc/header.php'; ?>




    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto my-5">
                <h1 class="text-center">Edit Info For User</h1>
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



                <form action="<?php echo URL."handelers/users/update.php?id=".$id; ?>" method="post" class="border p-2">
                    <input type="text" value="<?php echo $row['name']; ?>" name="name" class="form-control my-3" placeholder="type your name">
                    <input type="text" name="email" value="<?php echo $row['email']; ?>" class="form-control my-3" placeholder="type your email">
                    <input type="password" name="password" class="form-control my-3" placeholder="type your password">
                    <input type="submit"  class="form-control my-3 btn btn-success" value="Save">
                </form>
            </div>
        </div>
    </div>

<?php include ROOT_PATH.'inc/footer.php'; ?>