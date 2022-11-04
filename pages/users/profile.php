<?php session_start();
?>
<?php include '../../core/app.php'; ?>
<?php include ROOT_PATH.'core/database.php'; ?>
<?php include ROOT_PATH.'inc/header.php'; ?>


    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto my-5">
                <h1 class="text-center">Profile</h1>
            </div>
            <div class="col-12">
                <h3 class="border p-2 border-primary my-3"><?php echo $_SESSION['auth']['name']; ?></h3>
                <h3 class="border p-2 border-primary my-3"><?php echo $_SESSION['auth']['email']; ?></h3>
            </div>
        </div>
    </div>

<?php include ROOT_PATH.'inc/footer.php'; ?>