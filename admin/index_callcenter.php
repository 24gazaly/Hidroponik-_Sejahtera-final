<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Call Center - Hidroponik Sejahtera</title>
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
        .btn-delete { background-color: #e74c3c; }
        .btn-edit { background-color: #006A71; }
        .btn:hover, .btn-delete:hover, .btn-edit:hover { opacity: 0.8; }
        .nav {
            display: flex; justify-content: center; width: 100%;
        }
        .nav a {
            color: white; font-size: 20px; font-weight: 500;
            padding: 10px 22px; border-radius: 4px; text-decoration: none;
        }
        .nav a:hover { color: #000000; }
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
    <center><h1>Data Call Center</h1></center>
    <br>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Pesan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include('koneksi.php');
            $query = mysqli_query($koneksi, "SELECT * FROM call_center") or die(mysqli_error($koneksi));
            $no = 1;
            while ($data = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($data['nama_user']); ?></td>
                    <td><?= htmlspecialchars($data['email_user']); ?></td>
                    <td><?= htmlspecialchars($data['pesan']); ?></td>
                    <td>
                        <a href="edit_callcenter.php?id=<?= $data['id_callcenter']; ?>" class="btn-edit">Edit</a>
                        <a href="hapus_callcenter.php?id=<?= $data['id_callcenter']; ?>" class="btn-delete" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
