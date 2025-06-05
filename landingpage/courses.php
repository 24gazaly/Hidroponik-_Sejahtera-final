<?php
include('../admin/koneksi.php'); // koneksi ke database

// Ambil data produk
$result = mysqli_query($koneksi, "SELECT * FROM produk");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Hidroponik Sejahtera</title>
  <link
    href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Signika:wght@400;700&display=swap"
    rel="stylesheet"
  />
  <link
    rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
  />
  <link rel="stylesheet" href="style.css" />
</head>
<body>
<div class="navbar">
    <div class="logo">
      <h2>Hidroponik <span>Sejahtera</span></h2>
    </div>
    <div class="navigator">
      <a href="index.php">Home</a>
      <a href="courses.php">Our Product</a>
      <a href="about.html">About Us</a>
      <a href="callcenter.php">Call Center</a>
      <a href="riwayat_transaksi.php">History</a>
      <a href="../login, logout/profile.php">Account</a>
    </div>
  </div>

  <div class="banner">
    <div class="card-courses">
      <div class="text">
        <h1>Hidroponik <span>Sejahtera</span></h1>
        <p>The freshest Vegetables in the world</p>
      </div>
    </div>

    <div class="banner-image">
      <img src="gambar_lp/logo_hidroponik.png" alt="" />
      <div class="circle"></div>
    </div>
  </div>

  <div class="sub-title">
    <h2>Get Your Order Now!</h2>
    <hr />
  </div>

  <div class="courses">
    <?php while($row = mysqli_fetch_assoc($result)): ?>
      <div class="card-courses">
        <div class="card-courses-image">
          <img src="gambar_lp/<?= htmlspecialchars($row['gambar_produk']) ?>" alt="<?= htmlspecialchars($row['nama_produk']) ?>">
        </div>
        <div class="card-courses-text">
          <h2><?= htmlspecialchars($row['nama_produk']) ?></h2>
          <p><?= htmlspecialchars($row['deskripsi']) ?></p>
          <ol>
            <li>Single <?= htmlspecialchars($row['nama_produk']) ?> <span>Rp.<?= number_format($row['harga_1'],0,',','.') ?></span></li>
            <li>Bundling <?= htmlspecialchars($row['nama_produk']) ?> <span>Rp.<?= number_format($row['harga_2'],0,',','.') ?></span></li>
          </ol>
          <div class="card-courses-button">
            <a href="purchase.php?produk=<?= urlencode($row['nama_produk']) ?>">Order Now</a>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>

  <br />
  <br />
  <br />
  <br />
  <br />
  <br />

  <div class="footer">
    <h2>Hidroponik <span>Sejahtera </span></h2>
  </div>
</body>
</html>
