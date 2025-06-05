<?php
include("koneksi.php");

if (!isset($_GET['id'])) {
    header('Location: index_produk.php');
    exit;
}

$id = $_GET['id'];
$result = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk=$id");

while ($data = mysqli_fetch_array($result)) {
    $produk = $data['nama_produk'];
    $deskripsi = $data['deskripsi'];
    $harga_1 = $data['harga_1'];
    $harga_2 = $data['harga_2'];
    $gambar = $data['gambar_produk'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Produk</title>
    <link rel="stylesheet" href="edit_produk.css">
</head>
<body>
    <div class="container">
        <h1 class="title">Tabel Edit Produk</h1>

        <form method="POST" action="proses_edit_produk.php" enctype="multipart/form-data">
            <table class="form-table">
                <tr>
                    <td><label for="nama_produk">Nama Produk</label></td>
                    <td><input type="text" name="nama_produk" id="nama_produk" value="<?php echo $produk ?>"></td>
                </tr>
                <tr>
                    <td><label for="deskripsi">Deskripsi Produk</label></td>
                    <td><input type="text" name="deskripsi" id="deskripsi" value="<?php echo $deskripsi ?>"></td>
                </tr>
                <tr>
                    <td><label for="harga_1">Harga Satuan</label></td>
                    <td><input type="text" name="harga_1" id="harga_1" value="<?php echo $harga_1 ?>"></td>
                </tr>
                <tr>
                    <td><label for="harga_2">Harga Bundling</label></td>
                    <td><input type="text" name="harga_2" id="harga_2" value="<?php echo $harga_2 ?>"></td>
                </tr>
                <tr>
                    <td><label for="gambar_produk">Gambar Produk</label></td>
                    <td><input type="file" name="gambar_produk" id="gambar_produk"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET['id']); ?>">
                        <input type="submit" name="simpan" value="Simpan" class="submit-button">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
