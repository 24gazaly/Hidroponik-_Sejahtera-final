<?php
session_start();
include "../admin/koneksi.php";

if (!isset($_SESSION['id_user'])) {
    header("Location: ../login, logout/login.php");
    exit();
}

$id_user = $_SESSION['id_user'];
$query = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_user = '$id_user'");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding-top: 80px;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 60px;
            background-color: #006a71;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            z-index: 999;
        }

        .logo h2 {
            margin: 0;
            font-size: 24px;
            color:rgb(6, 135, 144);
        }

        .logo h2 span {
            color: #00b8a9;
            font-weight: bold;
        }

        .navbar .navigator a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
        }

        table {
            width: 80%;
            margin: 40px auto;
            border-collapse: collapse;
        }

        h2 {
            text-align: center;
            color: #006a71;
            margin: 30px 0 20px;
        }

        .table-container {
            max-width: 900px;
            margin: 0 auto;
            margin-top: 30px;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.05);
            padding: 24px 32px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #b4e0df;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .logout {
            display: block;
            width: max-content;
            margin: 30px auto 0;
            text-align: center;
            background-color: #006a71;
            color: white;
            padding: 10px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .logout:hover {
            background-color: #004f54;
        }
    </style>
</head>
<body>

<div class="navbar">
    <div class="logo">
        <h2>Hidroponik <span>Sejahtera</span></h2>
    </div>
    <div class="navigator">
        <a href="index.php">Home</a>
        <a href="courses.php">Product</a>
        <a href="riwayat_transaksi.php">History</a>
    </div>
</div>

<h2>Riwayat Transaksi Anda</h2>
<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Nama</th>
                <th>No. HandPhone</th>
                <th>Alamat</th>
                <th>Pengiriman</th>
                <th>Pembayaran</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        while ($data = mysqli_fetch_assoc($query)) {
            echo "<tr>
                    <td data-label='No'>{$no}</td>
                    <td data-label='Nama Produk'>{$data['nama_produk']}</td>
                    <td data-label='Nama'>{$data['nama_pembeli']}</td>
                    <td data-label='No. HandPhone'>{$data['no_handphone']}</td>
                    <td data-label='Alamat'>{$data['alamat_pembeli']}</td>
                    <td data-label='Pengiriman'>{$data['pengirimaan']}</td>
                    <td data-label='Pembayaran'>{$data['pembayaran']}</td>
                    <td data-label='Status'>{$data['status']}</td>
                </tr>";
            $no++;
        }
        ?>
        </tbody>
    </table>
</div>

<a class="logout" href="../login, logout/logout.php">Logout</a>

</body>
</html>
