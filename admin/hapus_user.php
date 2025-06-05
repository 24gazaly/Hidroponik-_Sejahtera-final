<?php
include_once("koneksi.php");

if(!isset($_GET['id'])){
    header('Location: index_user.php');
    exit();
}

$id = $_GET['id'];

$deleteUser = mysqli_query($koneksi, "DELETE FROM user WHERE id_user=$id");

if($deleteUser) {
    $result = mysqli_query($koneksi, "DELETE FROM user WHERE id_user=$id");

    if($result) {
        header("Location: index_user.php");
    } else {
        echo "Terjadi kesalahan saat menghapus pengguna.";
    }
} else {
    echo "Terjadi kesalahan saat menghapus pengguna.";
}
?>