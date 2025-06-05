<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD HIDROPONIK SEJAHTERA</title>
    <link rel="stylesheet" href="navbar.css">
    <style type="text/css">
        * { font-family: "Trebuchet MS"; }
        h1 { text-transform: uppercase; color: #48A6A7; }
        table {
            border: solid 1px #DDEEEE;
            border-collapse: collapse;
            width: 90%;
            margin: 10px auto;
        }
        table thead th {
            background-color: #9ACBD0;
            border: solid 1px #9ACBD0;
            color: #006A71;
            padding: 10px;
            text-align: center;
        }
        table tbody td {
            border: solid 1px #9ACBD0;
            color: black;
            padding: 10px;
            text-align: center;
        }
        .btn, .btn-delete, .btn-edit {
            padding: 10px;
            font-size: 12px;
            border-radius: 5px;
            color: white;
            text-decoration: none;
        }
        .btn { background-color: #48A6A7; }
        .btn-delete { background-color: #48A6A7; }
        .btn-edit { background-color: #006A71; }
        .btn:hover, .btn-delete:hover, .btn-edit:hover { opacity: 0.8; }
        header {
            position: fixed; top: 0; right: 0; width: 100%; z-index: 1000;
            display: flex; justify-content: center; align-items: center;
            background-color: #006A71; padding: 5px 0;
        }
        .navbar {
            display: flex; justify-content: center; width: 100%;
        }
        .navbar a {
            color: white; font-size: 20px; font-weight: 500;
            padding: 10px 22px; border-radius: 4px; text-decoration: none;
        }
        .navbar a:hover { color: #000000; }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="index_produk.php">Produk</a></li>
            <li><a href="index_user.php">User</a></li>
            <li><a href="index_transaksi.php">Transaksi</a></li>
            <li><a href="index_callcenter.php">CallCenter</a></li>
        </ul>
    </nav>
    <br>
    <center><h1>Data Transaksi</h1></center>
    <br>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No. Handphone</th>
                <th>Alamat</th>
                <th>Pengiriman</th>
                <th>Pembayaran</th>
                <th>Produk</th>
                <th>Harga</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include ('koneksi.php');
            $query_mysql = mysqli_query($koneksi, "SELECT t.*, p.harga_1, p.harga_2 FROM transaksi t JOIN produk p ON t.nama_produk = p.nama_produk") or die(mysqli_error($koneksi));
            $nomor = 1;
            while($data = mysqli_fetch_array($query_mysql)) {
                // Cek apakah harga berdasarkan pembayaran bundling atau satuan
                $harga = $data['pembayaran'] == 'bundling' ? $data['harga_2'] : $data['harga_1'];
                ?>
                <tr>
                    <td><?php echo $nomor++; ?></td>
                    <td><?php echo $data['nama_pembeli']; ?></td>
                    <td><?php echo $data['email_pembeli']; ?></td>
                    <td><?php echo $data['no_handphone']; ?></td>
                    <td><?php echo $data['alamat_pembeli']; ?></td>
                    <td><?php echo $data['pengirimaan']; ?></td>
                    <td><?php echo $data['pembayaran']; ?></td>
                    <td><?php echo $data['nama_produk']; ?></td>
                    <td>Rp <?php echo number_format($harga, 0, ',', '.'); ?></td>
                    <td>
                        <a href="hapus_transaksi.php?id=<?php echo $data['id_transaksi']; ?>" class="btn-delete" onClick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')">Hapus</a>
                        <a href="edit_transaksi.php?id=<?php echo $data['id_transaksi']; ?>" class="btn-edit">Edit</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>