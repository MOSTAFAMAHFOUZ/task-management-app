<?php session_start(); ?>
<?php include '../../core/app.php'; ?>
<?php include ROOT_PATH.'core/database.php'; ?>
<?php include ROOT_PATH.'inc/header.php'; ?>


    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto my-5">
                <h1 class="text-center">Add New User</h1>
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



                <form action="<?php echo URL."handelers/users/store.php"; ?>" method="post" class="border p-2">
                    <input type="text" name="name" class="form-control my-3" placeholder="type your name">
                    <input type="text" name="email" class="form-control my-3" placeholder="type your email">
                    <input type="password" name="password" class="form-control my-3" placeholder="type your password">
                    <input type="submit"  class="form-control my-3 btn btn-success" value="Add">
                </form>
            </div>
        </div>
    </div>

<?php include ROOT_PATH.'inc/footer.php'; ?>