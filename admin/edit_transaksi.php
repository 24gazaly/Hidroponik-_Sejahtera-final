<?php
include("koneksi.php");

if (!isset($_GET['id'])) {
    header('Location: index_transaksi.php');
    exit();
}

$id = $_GET['id'];

$result = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_transaksi = $id");

$data = mysqli_fetch_assoc($result);

$nama = $data['nama_pembeli'];
$email = $data['email_pembeli'];
$nohp = $data['no_handphone'];
$alamat = $data['alamat_pembeli'];
$pengiriman = $data['pengirimaan'];
$pembayaran = $data['pembayaran'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Edit</title>
    <link rel="stylesheet" href="edit_transaksi.css
    ">
</head>
<body>
    <div class="container">
    <h1 class="title">Tabel Edit Transaksi</h1>

    <form method="POST" action="proses_edit_transaksi.php">
    <table>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama_pembeli" value="<?php echo $nama ?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email_pembeli" value="<?php echo $email ?>"></td>
        </tr>
        <tr>
            <td>No. Handphone</td>
            <td><input type="text" name="no_handphone" value="<?php echo $nohp ?>"></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><input type="text" name="alamat_pembeli" value="<?php echo $alamat ?>"></td>
        </tr>
        <tr>
            <td>Metode Pengiriman</td>
            <td>
                <select name="pengirimaan">
                    <option value="gojol" <?php if($pengiriman == 'gojol') echo 'selected'; ?>>Gojol</option>
                    <option value="crabfood" <?php if($pengiriman == 'crabfood') echo 'selected'; ?>>Crab Food</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Metode Pembayaran</td>
            <td>
                <select name="pembayaran">
                    <option value="dana" <?php if($pembayaran == 'dana') echo 'selected'; ?>>Dana</option>
                    <option value="gopay" <?php if($pembayaran == 'gopay') echo 'selected'; ?>>GoPay</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><input type="hidden" name="id" value="<?php echo $id; ?>"></td>
            <td><input type="submit" name="simpan" value="Simpan"></td>
        </tr>
    </table>
</form>
</div>
</body>

</html>