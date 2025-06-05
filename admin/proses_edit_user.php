<?php
include("koneksi.php");

if(isset($_POST['simpan'])){
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "UPDATE user SET username='$username', password='$password' WHERE id_user='$id'";
    $query = mysqli_query($koneksi, $sql);

    if($query){
        header('Location: index_user.php'); 
    } else {
        echo "Gagal update: " . mysqli_error($koneksi);
    }
}
?>
