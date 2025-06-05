<?php
include_once("koneksi.php");

if(!isset($_GET['id'])){
    header('Location: index_produk.php');
    exit();
}

$id = $_GET['id'];

$deleteProduct = mysqli_query($koneksi, "DELETE FROM produk WHERE id_produk=$id");

if($deleteProduct) {
    $result = mysqli_query($koneksi, "DELETE FROM produk WHERE id_produk=$id");

    if($result) {
        header("Location: index_produk.php");
    } else {
        echo "Terjadi kesalahan saat menghapus produk.";
    }
} else {
    echo "Terjadi kesalahan saat menghapus produk.";
}
?>