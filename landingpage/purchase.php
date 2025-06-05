<?php
session_start();
include('../admin/koneksi.php');

// Cek login
if (!isset($_SESSION['id_user'])) {
    header("Location: ../login, logout/login.php");
    exit();
}

$id_user = $_SESSION['id_user'];
$namaProduk = isset($_GET['produk']) ? $_GET['produk'] : '';

// Ambil harga produk
$hargaSatuan = $hargaBundling = '';
if (!empty($namaProduk)) {
    $query = "SELECT harga_1, harga_2 FROM produk WHERE nama_produk = '$namaProduk'";
    $result = mysqli_query($koneksi, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        $hargaSatuan = $data['harga_1'];
        $hargaBundling = $data['harga_2'];
    }
}

// Jika form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama_pembeli'];
    $email = $_POST['email_pembeli'];
    $nohp = $_POST['no_handphone'];
    $alamat = $_POST['alamat_pembeli'];
    $pengiriman = $_POST['pengirimaan'];
    $pembayaran = $_POST['pembayaran'];
    $produk = $_POST['nama_produk'];
    $status = 'Selesai'; // langsung tandai sebagai selesai

    if (empty($nama) || empty($email) || empty($nohp) || empty($alamat) || empty($pengiriman) || empty($pembayaran) || empty($produk)) {
        die("Semua data harus diisi!");
    }

    $query = "INSERT INTO transaksi (id_user, nama_pembeli, email_pembeli, no_handphone, alamat_pembeli, pengirimaan, pembayaran, nama_produk, status)
              VALUES ('$id_user', '$nama', '$email', '$nohp', '$alamat', '$pengiriman', '$pembayaran', '$produk', '$status')";

    if (mysqli_query($koneksi, $query)) {
        header("Location: complete.html");
        exit();
    } else {
        die("Gagal menyimpan: " . mysqli_error($koneksi));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Hidroponik Sejahtera</title>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Signika:wght@400;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="style.css" />
  <style>
    .form-wrapper {
      display: flex;
      justify-content: space-between;
      gap: 50px;
      flex-wrap: wrap;
    }

    .form-left, .form-right {
      flex: 1;
      min-width: 300px;
    }

    .form-left input,
    .form-right select {
      width: 100%;
      margin-bottom: 15px;
      padding: 10px;
      font-size: 16px;
    }

    .purchase-type .type {
      display: flex;
      gap: 10px;
      margin-top: 10px;
    }

    .purchase-type .cek-type {
      display: flex;
      align-items: center;
      border: 2px solid #b4ac95;
      border-radius: 5px;
      padding: 10px;
    }

    .purchase-type img {
      width: 100px;
      height: 30px;
    }

    .button {
      text-align: left;
      margin-top: 30px;
    }

    .button button {
      padding: 10px 30px;
      background-color: #b4ac95;
      color: black;
      border: none;
      border-radius: 20px;
      font-size: 16px;
      cursor: pointer;
    }

    .form-left h2:first-child {
      margin-bottom: 10px;
      font-size: 24px;
      color: #b4ac95;
    }

    .harga-section {
      margin-top: 20px;
    }

    .harga-section label {
      font-weight: bold;
    }

    .harga-section p {
      margin: 5px 0;
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
      <p>The freshest Vegetable in the world</p>
    </div>
  </div>
  <div class="banner-image">
    <img src="../landingpage/gambar_lp/logo_hidroponik.png" alt="" />
    <div class="circle"></div>
  </div>
</div>

<div class="sub-title">
  <h2>Complete The Order</h2>
  <hr />
</div>

<div class="registration">
  <form class="form" method="POST" action="">
    <div class="form-wrapper">
      <div class="form-left">
        <h2>Data Order</h2><br>

        <p><strong>Pesanan Anda:</strong> <?php echo htmlspecialchars($namaProduk); ?></p>
        <input type="hidden" name="nama_produk" value="<?php echo htmlspecialchars($namaProduk); ?>"><br>

        <label>Name</label>
        <input type="text" name="nama_pembeli" required />

        <label>Email</label>
        <input type="email" name="email_pembeli" required />

        <label>No Phone</label>
        <input type="text" name="no_handphone" required />

        <label>Address</label>
        <input type="text" name="alamat_pembeli" required />
      </div>

      <div class="form-right">
        <div class="class-type">
          <h2>Choose Delivery Option</h2>
          <select name="pengirimaan" required>
            <option value="">-- Select --</option>
            <option value="gojol">Gojol</option>
            <option value="crabfood">Crab Food</option>
          </select>
        </div>

        <div class="harga-section">
          <h2>Pilih Harga</h2>
          <div>
            <input type="radio" name="jenis_harga" value="satuan" required>
            <label>Harga Satuan: Rp <?php echo number_format($hargaSatuan, 0, ',', '.'); ?></label>
          </div>
          <div>
            <input type="radio" name="jenis_harga" value="bundling" required>
            <label>Harga Bundling: Rp <?php echo number_format($hargaBundling, 0, ',', '.'); ?></label>
          </div>
        </div>

        <br>

        <div class="purchase-type">
          <h2>Choose Your Payment Method</h2>
          <div class="type">
            <div class="cek-type">
              <input type="radio" name="pembayaran" value="dana" required />
              <label><img src="../img/DANA_CHNL_LOGO.png" alt="Dana" /></label>
            </div>
            <div class="cek-type">
              <input type="radio" name="pembayaran" value="gopay" required />
              <label><img src="../img/GO_PAY_CHNL_LOGO.png" alt="GoPay" /></label>
            </div>
          </div>
        </div>

        <div class="button">
          <button type="submit">Order Now!</button>
        </div>
      </div>
    </div>
  </form>
</div>

<div class="footer">
  <h2>Hidroponik <span>Sejahtera</span></h2>
</div>
</body>
</html>