<?php 
session_start(); 
include '../../core/app.php'; ?>
<?php include ROOT_PATH.'core/database.php'; ?>


<?php  

if(isset($_GET['id'])){
    $conn = mysqli_connect("localhost","root","","todoapp");
    if(!$conn){
        $_SESSION['errors']=  "connect error " . mysqli_connect_error($conn);
    }
    
    $id = $_GET['id'];

    $sql = "SELECT * FROM `tasks`  WHERE `id` = '$id' ";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    if(!$row){
        $_SESSION['errors'] = "data not exists !";
        header("location:index.php");
        die;
    }
}

// echo "<pre>";
// print_r();


?>

<?php include ROOT_PATH.'inc/header.php';  ?>
    

    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <form action="<?php echo URL;?>handelers/update-task.php?id=<?php echo $_GET['id']; ?>" method="POST" class="form border p-2 my-5">

                    <?php if(isset($_SESSION['errors'])): ?>
                        <div class="alert alert-danger text-center">
                            <?php 
                                echo $_SESSION['errors']; 
                                unset($_SESSION['errors']);
                            ?>
                            
                        </div>
                    <?php endif; ?>
                    <input type="text" name="title" value="<?php echo $row['title']; ?>"  class="form-control my-3 border border-success" placeholder="add new todo">
                    <input type="submit" value="Save"  class="form-control btn btn-primary my-3 " placeholder="add new todo">
                </form>
            </div>
          
        </div>
    </div>

<?php include ROOT_PATH.'inc/footer.php';  ?>
