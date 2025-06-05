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
    text-transform: uppercase;
    color: #B0DB9C;
}
table {
  border: solid 1px #DDEEEE;
  border-collapse: collapse;
  border-spacing: 0;
  width: 70%;
  margin: 10px auto 10px auto;
}
table thead th {
    background-color: #CAE8BD;
    border: solid 1px #9ACBD0;
    color:rgb(174, 190, 166);
    padding: 10px;
    text-align: center;
    text-shadow: 1px 1px 1px #ccc;
    text-decoration: none;
}
table tbody td {
    border: solid 1px #9ACBD0;
    color: black;
    padding: 10px;
    text-align: center;
    
}
.btn {
      background-color: #48A6A7;
      color: #fff;
      padding: 10px;
      text-decoration: none;
      font-size: 12px;
}
.btn-delete {
    background-color: #B2CD9C;
    color: white;
    border-radius: 5px;
    padding: 10px;
    font-size: 12px;
}

.btn-edit {
    background-color: #255F38;
    color: white;
    border-radius: 5px;
    padding: 10px;
    font-size: 12px;
}

.btn:hover, .btn-delete:hover, .btn-edit:hover {
    opacity: 0.8;
}



header{
    position: fixed; 
    top: 0;
    right: 0;
    width: 100%;
    z-index: 1000;
    display: flex;
    justify-content: center; 
    align-items: center;
    background-color: #006A71;
    padding: 5px 0; 
    margin: 0;
}

.navbar{
    display: flex;
    justify-content: center;
    width: 100%;
}

.navbar a{
    color: white;
    font-size: 20px;
    font-weight: 500;
    padding: 10px 22px;
    border-radius: 4px;
    transition: ease .40s;
    text-decoration: none;
}

.navbar a:hover{
    color: #000000;
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
            <li>
                <a href="index_transaksi.php">Transaksi</a>
            </li>
            <li>
                <a href="index_callcenter.php">CallCenter</a>
            </li>
        </ul>
    </nav>
    <br>
    <center><h1>Data Pengguna</h1><center>
    <br/>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Username</th>
          <th>Password</th>
          <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            include ('koneksi.php');
            $query_mysql = mysqli_query($koneksi, "SELECT * FROM user") or die(mysqli_error($koneksi));
            $nomor = 1;
            while($data = mysqli_fetch_array($query_mysql)) { 
            ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['username']; ?></td>
                <td><?php echo $data['password']; ?></td>
                <td><a href="hapus_user.php?id=<?php echo $data['id_user'];  ?>" class="btn-delete" onClick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')">Hapus</a>
                <a href="edit_user.php?id=<?php echo $data['id_user']; ?>" class="btn-edit">Edit</a></td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
        </br>
    </div>
</body>
</html>