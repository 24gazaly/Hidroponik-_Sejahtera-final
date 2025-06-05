<?php
include '../admin/koneksi.php';
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Hidroponik Sejahtera</title>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Signika:wght@400;700&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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

  </div>
  <div class="banner">
    <div class="card-courses">
      <div class="text">
        <h1>Hidroponik <span>Sejahtera</span></h1>
        <p>
          The freshes Vegetable in the world
        </p>
        <a href="courses.php">The Product</a>
      </div>
    </div>

    <div class="banner-image">
      <img src="gambar_lp/logo_hidroponik.png" alt="" />
      <div class="circle"></div>
    </div>
  </div>

  <!-- superior -->
  <div class="superior">
    <div class="superior-image">
      <img src="gambar_lp/logo_hidroponik.png" alt="" />
    </div>
    <div class="superior-text">
      <div class="card">
        <div class="card-icon">
          <span class="material-symbols-outlined">sleep</span>
        </div>
        <div class="card-text">
          <h3>Vegetable</h3>
          <p>Can make our body relax and Healty</p>
        </div>
      </div>
      <div class="card">
        <div class="card-icon">
          <span class="material-symbols-outlined">coffee</span>
        </div>
        <div class="card-text">
          <h3>Power</h3>
          <p>With eating vegetable it can make our body fit</p>
        </div>
      </div>
    </div>
  </div>

  <!-- promotion -->
  <div class="promotion">
    <div class="promotion-image">
      <img src="gambar_lp/logo_hidroponik.png" alt="" />
    </div>
    <div class="promotion-text">
      <h2>
        You can order with <span> Website </span> And <span> It can deliver </span> By ojek online
      </h2>
      <hr />
      <div class="image">
        <img src="gambar_lp/Selada.png" alt="" />
        <img src="gambar_lp/Pakcoy.png" alt="" />
        <img src="gambar_lp/bayam merah.png" alt="" />
      </div>
    </div>
  </div>

  <!-- footer-->

  <div class="footer">
    <h2>Hidroponik <span>Sejahtera </span></h2>
  </div>
</body>

</html>