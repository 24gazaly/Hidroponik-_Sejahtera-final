<?php
include("koneksi.php");

if(isset($_POST['simpan'])){
    $id = $_POST['id'];
    $nama = $_POST['nama_pembeli'];
    $email = $_POST['email_pembeli'];
    $nohp = $_POST['no_handphone'];
    $alamat = $_POST['alamat_pembeli'];
    $pengiriman = $_POST['pengirimaan'];
    $pembayaran = $_POST['pembayaran'];

    $sql = "UPDATE transaksi SET nama_pembeli='$nama', email_pembeli='$email', no_handphone='$nohp', alamat_pembeli='$alamat', pengirimaan='$pengiriman', pembayaran='$pembayaran' WHERE id_transaksi='$id'";
    $query = mysqli_query($koneksi, $sql);

    if($query){
        header('Location: index_transaksi.php'); 
    } else {
        echo "Gagal update: " . mysqli_error($koneksi);
    }
}
?>
