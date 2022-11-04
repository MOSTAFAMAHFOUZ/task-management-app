<?php 

// connection

$conn = mysqli_connect("localhost", "root", "", "todoapp");
if (!$conn) {
    echo "connect error " . mysqli_connect_error($conn);
    die;
}


function getAll($query){

    global $conn;
    return mysqli_query($conn,$query);
}



function getRow($table,$id){
    global $conn;
    $sql = "SELECT * FROM `$table` WHERE `id`='$id' ";
    return mysqli_query($conn,$sql);
}




function insert($query){

    global $conn;
    return mysqli_query($conn,$query);
}



function delete($table,$id){
    global $conn;
    $sql = "DELETE FROM `$table`  WHERE `id` = '$id' ";
    return mysqli_query($conn,$sql);
}