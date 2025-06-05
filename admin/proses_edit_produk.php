<?php
include("koneksi.php");

if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $nama_produk = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $harga_1 = $_POST['harga_1'];
    $harga_2 = $_POST['harga_2'];

    // Cek apakah user upload gambar baru
    if ($_FILES['gambar_produk']['name'] != '') {
        $gambar = $_FILES['gambar_produk']['name'];
        $tmp = $_FILES['gambar_produk']['tmp_name'];
        $folder = "gambar/";

        // Pindahkan file ke folder
        move_uploaded_file($tmp, $folder . $gambar);

        // Update dengan gambar baru
        $sql = "UPDATE produk SET 
            nama_produk='$nama_produk',
            deskripsi='$deskripsi',
            harga_1='$harga_1',
            harga_2='$harga_2',
            gambar_produk='$gambar'
            WHERE id_produk=$id";
    } else {
        // Update tanpa gambar
        $sql = "UPDATE produk SET 
            nama_produk='$nama_produk',
            deskripsi='$deskripsi',
            harga_1='$harga_1',
            harga_2='$harga_2'
            WHERE id_produk=$id";
    }

    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        // Redirect ke daftar produk
        header("Location: index_produk.php?status=sukses");
        exit;
    } else {
        echo "Gagal mengedit data: " . mysqli_error($koneksi);
    }
} else {
    echo "Akses langsung tidak diperbolehkan.";
}
?>
