<?php session_start();
?>
<?php include '../../core/app.php'; ?>
<?php include ROOT_PATH.'core/database.php'; ?>
<?php include ROOT_PATH.'inc/header.php'; 

    $sql = "SELECT * ,tasks.id as task_id, users.id as Userid  FROM `tasks` INNER JOIN `users` ON users.id=tasks.user_id ";
    $result = getAll($sql);

?>


    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <form action="<?php echo URL;?>handelers/store-task.php" method="POST" class="form border p-2 my-5">
                    <?php if (isset($_SESSION['success'])) : ?>
                        <div class="alert alert-success text-center">
                            <?php
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                            ?>

                        </div>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['errors'])) : ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            echo $_SESSION['errors'];
                            unset($_SESSION['errors']);
                            ?>

                        </div>
                    <?php endif; ?>
                    <input type="text" name="title" class="form-control my-3 border border-success" placeholder="add new todo">
                    <input type="submit" value="Add" class="form-control btn btn-primary my-3 " placeholder="add new todo">
                </form>
            </div>
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Task</th>
                            <th>User</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $i=1; while ($row = mysqli_fetch_assoc($result)) : ?>

                            <?php //echo "<pre>"; print_r($row); die; ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td>
                                    <a href="<?php echo URL;?>handelers/delete-task.php?id=<?php echo $row['task_id']; ?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i> </a>
                                    <a href="<?php echo URL;?>pages/tasks/update.php?id=<?php echo $row['task_id']; ?>" class="btn btn-info"><i class="fa-solid fa-edit"></i> </a>
                                </td>
                            </tr>
                        <?php endwhile;  ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php include ROOT_PATH.'inc/footer.php'; ?>