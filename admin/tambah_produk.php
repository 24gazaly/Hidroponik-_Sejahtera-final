<?php include('koneksi.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD HIDROPONIK SEJAHTERA</title>
    <link rel="stylesheet" href="navbar.css">
    <style type="text/css">
        * {
            font-family: "Trebuchet MS";
        }
        h1 {
            text-transform: upperchase;
            color: salmon;
        }
        .base {
            width: 400px;
            padding: 20px;
            margin-left: auto;
            margin-right: auto;
            background-color: #ededed;
        }
        label {
            margin-top: 10px;
            float: left;
            text-align: left;
            width: 100%;
        }
        input {
            padding: 6px;
            width: 100%;
            box-sizing: border-box;
            background-color: #f8f8f8;
            border: 2px solid #ccc;
            outline-color: salmon;
        }
        button {
            background-color: salmon;
            color: #fff;
            padding: 10px;
            font-size: 12px;
            border: 0;
            margin-top: 20px;
        }
    </style>
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
        </ul>
    </nav>
    <br>
    <center><h1>Tambah Produk</h1></center>
    <br>
    <form method="POST" action="proses_tambah_produk.php" enctype="multipart/form-data">
    <section class="base">
        <div>
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" autofocus="" required="" />
        </div>
        <div>
            <label>Deskripsi</label>
            <input type="text" name="deskripsi" />
        </div>
        <div>
            <label>Harga 1</label>
            <input type="text" name="harga_1"  required="" />
        </div>
        <div>
            <label>Harga 2</label>
            <input type="text" name="harga_2"  required="" />
        </div>
        <div>
            <label>Gambar Produk</label>
            <input type="file" name="gambar_produk"  required=""  />
        </div>
        <div>
            <button type="submit">Simpan Produk</button>
        </div>
    </section>
    </form>
</body>
</html>