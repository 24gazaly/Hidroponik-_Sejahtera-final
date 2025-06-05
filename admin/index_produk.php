<?php include('koneksi.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD HIDROPONIK SEJAHTERA</title>
    <style type="text/css">
        * {
            font-family: "Trebuchet MS";
        }
        table {
            border: 1px solid #ddeeee;
            border-collapse: collapse;
            border-spacing: 0;
            width: 70%;
            margin: 10px auto 10px auto;
        }
        table thead th{
            background-color: #ddefef;
            border: 1px solid #ddeeee;
            color: #336b6b;
            padding: 10px;
            text-align: left;
            text-shadow: 1px 1px 1px #fff;
        }
        table tbody td {
            border: 1px solid #ddeeee;
            color: #333;
            padding: 10px;
        }
        a {
            background-color: antiquewhite;
            color: #538f59;
            padding: 10px;
            font-size: 12px;
            text-decoration: none;
        }
    </style>
    <link rel="stylesheet" href="navbar.css">
</head>
<body>
    <nav>
        <ul>
            <li>
                <a href="index_produk.php">Produk</a>
            </li>
            <li>
                <a href="index_user.php">User</a>
            </li>
            <li>
                <a href="index_transaksi.php">Transaksi</a>
            </li>
            <li>
                <a href="index_callcenter.php">CallCenter</a>
            </li>
        </ul>
    </nav>
    <br>
    <center><h1>Data Produk</h1><center>
        <br>
    <center><a href="tambah_produk.php">+ &nbsp; Tambah produk</a></center>
    <br>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Produk</th>
                <th>Deskripsi</th>
                <th>Harga1</th>
                <th>Harga2</th>
                <th>Gambar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $query = "SELECT * FROM produk ORDER BY id_produk ASC";
                $result = mysqli_query($koneksi, $query);

                if(!$result) {
                    die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
                }
                $no = 1;

                while ($row = mysqli_fetch_assoc($result)) {   
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $row['nama_produk']; ?></td>
                <td><?php echo substr($row['deskripsi'], 0,20); ?>...</td>
                <td>Rp <?php echo number_format($row['harga_1'], 0,',','.'); ?></td>
                <td>Rp <?php echo number_format($row['harga_2'], 0,',','.'); ?></td>
                <td><img style="width: 120px;" src="gambar/<?php echo $row['gambar_produk']; ?>"></td>
                <td>
                    <a href="edit_produk.php?id=<?php echo $row['id_produk']; ?>">Edit</a> 
                    <a href="hapus_produk.php?id=<?php echo $row['id_produk']; ?>" onclick="return confirm('Anda yakin ingin hapus data ini?')">Hapus</a>
                </td>
                
            </tr>
            <?php 
            $no++;
            }
            ?>
        </tbody>
    </table>
</body>
</html>