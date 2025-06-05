<?php
include_once("koneksi.php");

if(!isset($_GET['id'])){
    header('Location: index_transaksi.php');
    exit();
}

$id = $_GET['id'];

$deleteUser = mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_transaksi=$id");

if($deleteUser) {
    $result = mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_transaksi=$id");

    if($result) {
        header("Location: index_transaksi.php");
    } else {
        echo "Terjadi kesalahan saat menghapus transaksi.";
    }
} else {
    echo "Terjadi kesalahan saat menghapus transaksi.";
}
?>