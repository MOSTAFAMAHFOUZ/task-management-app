<?php session_start();
?>
<?php include '../../core/app.php'; ?>
<?php include ROOT_PATH.'core/database.php'; ?>
<?php include ROOT_PATH.'inc/header.php'; ?>

<?php

    $sql = "SELECT * FROM `users`";
    $result = getAll($sql);


?>


    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto my-5">
                <h1 class="text-center">All Users</h1>
            </div>
            <div class="col-12">
                <?php if(isset($_SESSION['success'])): ?>
                        <div class="alert alert-success text-center"><?php echo $_SESSION['success']; ?></div>
                <?php unset($_SESSION['success']); ?>
                <?php endif; ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>name</th>
                            <th>email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php 
                        $i=1;
                        while($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td>
                                <a href="<?php echo URL."pages/users/edit-user.php?id=".$row['id']; ?>" class="btn btn-info">Edit</a>
                                <a href="<?php echo URL."handelers/users/delete-user.php?id=".$row['id']; ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php include ROOT_PATH.'inc/footer.php'; ?>