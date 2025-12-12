<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
<<<<<<< HEAD
    header("Location: index.php");
    exit;
}

// Inisialisasi cart di session jika belum ada
if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Kosongkan keranjang
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['clear_cart'])) {
    $_SESSION['cart'] = [];
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Proses form submit
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['clear_cart'])) {

    // Ambil dan sanitasi input
    $kode   = trim($_POST['kode'] ?? '');
    $nama   = trim($_POST['nama'] ?? '');
    $harga  = $_POST['harga'] ?? '';
    $jumlah = $_POST['jumlah'] ?? '';

    // Validasi sederhana
    $errors = [];
    if ($kode === '') $errors[] = "Kode barang harus diisi.";
    if ($nama === '') $errors[] = "Nama barang harus diisi.";
    if ($harga === '' || !is_numeric($harga) || $harga < 0) 
        $errors[] = "Harga tidak valid.";
    if ($jumlah === '' || !is_numeric($jumlah) || $jumlah <= 0) 
        $errors[] = "Jumlah tidak valid.";

    // Jika valid
    if (empty($errors)) {

        $harga  = (int)$harga;
        $jumlah = (int)$jumlah;
        $lineTotal = $harga * $jumlah;

        // Tambah item ke cart
        $_SESSION['cart'][] = [
            'kode'      => $kode,
            'nama'      => $nama,
            'harga'     => $harga,
            'jumlah'    => $jumlah,
            'lineTotal' => $lineTotal,
        ];

        // Redirect PRG pattern
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

// Hitung total dari cart
$cart = $_SESSION['cart'];
$grandtotal = 0;
foreach ($cart as $item) {
    $grandtotal += $item['lineTotal'];
}

// Hitung diskon
if ($grandtotal == 0) {
    $diskon = 0;
    $d = "0%";
} elseif ($grandtotal < 50000) {
    $d = "5%";
    $diskon = 0.05 * $grandtotal;
} elseif ($grandtotal <= 100000) {
    $d = "10%";
    $diskon = 0.10 * $grandtotal;
} else {
    $d = "15%";
    $diskon = 0.15 * $grandtotal;
}

$totalbayar = $grandtotal - $diskon;
=======
  header("Location: index.php");
  exit;
}

// Daftar barang

    $barang = [
        ["K001", "Teh Pucuk", "3000"],
        ["K002", "Sukro", "2500"],
        ["K003", "Sprite", "5000"],
        ["K004", "Coca Cola", "6000"],
        ["K005", "Chitose", "4000"],
    ];
 
    $jumlah = count($barang) - 1;
    $beli = 0;
    $total = 0;
    $grandtotal = 0;
>>>>>>> 191e39932cd48e9be473b5dd5ed45140b1d28aca
?>
<!DOCTYPE html>
<html lang="id">
<<<<<<< HEAD

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Dashboard - POLGAN MART</title>

=======
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin - POLGAN MART</title>
>>>>>>> 191e39932cd48e9be473b5dd5ed45140b1d28aca
    <style>
        :root {
            --bg: #f5f7fb;
            --card: #ffffff;
            --accent: #1f6feb;
            --muted: #6b7280;
            --border: #e6e9ef;
            --success: #10b981;
        }

        * {
            box-sizing: border-box;
            font-family: Inter, "Segoe UI", Roboto, Arial, sans-serif
        }

        body {
<<<<<<< HEAD
            margin: 0;
            background: var(--bg);
            color: #111827;
            padding: 24px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        header {
=======
            font-family: Arial, sans-serif;
            background-color: #f5f7fb;
            margin: 0;
            padding: 0;
        }

        /* ===== Header ===== */
        header {
            background-color: #ffffff;
            border-bottom: 1px solid #ddd;
>>>>>>> 191e39932cd48e9be473b5dd5ed45140b1d28aca
            display: flex;
            align-items: center;
<<<<<<< HEAD
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 20px;
        }

        .logout-btn {
            padding: 8px 12px;
            background: blue;
            border-radius: 8px;
            border: 1px solid var(--border);
            color: white;
            cursor: pointer;
        }

        .logout-btn:hover {
            background: #fff;
            color: blue;
        }

        .card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 18px;
            box-shadow: 0 6px 18px rgba(9, 30, 66, 0.04);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 12px;
            font-size: 14px;
        }

        th,
        td {
            padding: 10px 12px;
            border-bottom: 1px solid var(--border);
        }

        .right {
            text-align: right;
        }

        .form-group {
            margin-bottom: 16px;
        }

        input,
        select {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid var(--border);
            border-radius: 8px;
        }

        .btn {
            padding: 10px 14px;
            background: var(--accent);
            color: white;
            border-radius: 8px;
            cursor: pointer;
            border: 0;
        }

        .btn-reset {
            padding: 10px 14px;
            background: blue;
            color: white;
            border-radius: 8px;
            cursor: pointer;
            border: 0;
=======
            padding: 12px 30px;
        }
        .header-left {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo {
            background-color: #3578e5;
            color: #fff;
            font-weight: bold;
            border-radius: 6px;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
>>>>>>> 191e39932cd48e9be473b5dd5ed45140b1d28aca
        }

        .title h2 {
            margin: 0;
            font-size: 18px;
            font-weight: 600;
        }

        .title p {
            margin: 0;
            font-size: 12px;
            color: #555;
        }

        .header-right {
            text-align: right;
        }

        .header-right p {
            margin: 0;
            font-size: 14px;
            color: #333;
        }

        .header-right span {
            font-size: 12px;
            color: #777;
        }

        .logout-btn {
            margin-top: 5px;
            background-color: #ffffff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 6px 12px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .logout-btn:hover {
            background-color: #f0f0f0;
        }

        /* ===== Konten utama ===== */
        .container {
            margin: 40px 20px;
            text-align: left;
        }

        h2 {
            margin: 0 0 5px 0;
            color: #333;
        }

        p {
            margin: 0;
            color: #555;
            font-size: 14px;
        }

        button {
            margin-top: 10px;
            background-color: #ffffff;
            color: #333;
            border: 1px solid #ccc;
            padding: 6px 12px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #f0f0f0;
        }

        main {
      background-color: white;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    form {
      width: 90%;
      margin-bottom: 30px;
      margin-bottom: 30px;
    }

    input[type="text"],
    input[type="number"] {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .container {
      display: flex;
      margin-top: -3px;
    }

    input[type="submit"],
    input[type="reset"] {
      width: 20%;
      padding: 10px;
      margin: 10px 1%;
      border: none;
      border-radius: 4px;
      background-color: #007bff;
      color: white;
      cursor: pointer;
    }

    input[type="reset"] {
      background-color: white;
      color: #333;
      border: 1px solid #ccc;
    }

    table {
      width: 80%;
      border-collapse: collapse;
    }

    th,
    td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
    }

    </style>
</head>

<body>
<<<<<<< HEAD
    <div class="container">

        <header>
            <div>
                <h2>--POLGAN MART--</h2>
                <p>Sistem Penjualan Sederhana</p>
            </div>

            <div>
                <p><strong>Selamat datang, admin!</strong><br><span>Role: Dosen</span></p>
                <a href="logout.php">logout</a>
            </div>
        </header>

        <main class="card">

            <?php if (!empty($errors)) : ?>
                <div style="color:#b91c1c; margin-bottom:12px;">
                    <?php foreach ($errors as $err) echo htmlspecialchars($err) . "<br>"; ?>
                </div>
            <?php endif; ?>

            <!-- FORM INPUT BARANG -->
            <form method="post" novalidate>
                <div class="form-group">
                    <label for="kode">Kode Barang</label>
                    <select id="kode" name="kode" required>
                        <option value="" disabled selected>Pilih Kode Barang</option>
                        <option value="BRG001">BRG001 - Sabun Mandi</option>
                        <option value="BRG002">BRG002 - Sikat Gigi</option>
                        <option value="BRG003">BRG003 - Pasta Gigi</option>
                        <option value="BRG004">BRG004 - Shampoo</option>
                        <option value="BRG005">BRG005 - Handuk</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="nama">Nama Barang</label>
                    <input type="text" id="nama" name="nama" required>
                </div>

                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" id="harga" name="harga" min="0" required>
                </div>

                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" id="jumlah" name="jumlah" min="1" required>
                </div>

                <button type="submit" class="btn">Tambahkan</button>
                <button type="reset" class="btn-reset">Batal</button>
            </form>

            <h2 style="text-align:center; margin-top:20px;">Daftar Pembelian</h2>

            <?php if (count($cart) === 0) : ?>
                <p>Tidak ada pembelian.</p>

            <?php else : ?>
                <table>
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th class="right">Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($cart as $item) : ?>
                            <tr>
                                <td><?= htmlspecialchars($item['kode']) ?></td>
                                <td><?= htmlspecialchars($item['nama']) ?></td>
                                <td>Rp <?= number_format($item['harga'], 0, ',', '.') ?></td>
                                <td><?= htmlspecialchars($item['jumlah']) ?></td>
                                <td class="right">Rp <?= number_format($item['lineTotal'], 0, ',', '.') ?></td>
                            </tr>
                        <?php endforeach; ?>

                        <tr class="total-row">
                            <td colspan="3"></td>
                            <td class="right">Total Belanja</td>
                            <td class="right">Rp <?= number_format($grandtotal, 0, ',', '.') ?></td>
                        </tr>

                        <tr class="total-row">
                            <td colspan="3"></td>
                            <td class="right">Diskon (<?= $d ?>)</td>
                            <td class="right">Rp <?= number_format($diskon, 0, ',', '.') ?></td>
                        </tr>

                        <tr class="total-row">
                            <td colspan="3"></td>
                            <td class="right">Total Bayar</td>
                            <td class="right">Rp <?= number_format($totalbayar, 0, ',', '.') ?></td>
                        </tr>
                    </tbody>
                </table>

                <form method="post" style="margin-top:12px;">
                    <button type="submit" name="clear_cart" class="btn-reset">Kosongkan Keranjang</button>
                </form>

            <?php endif; ?>

        </main>

    </div>

    <script>
        // Auto isi nama & harga berdasarkan kode
        const barangData = {
            "BRG001": { nama: "Sabun Mandi", harga: 15000 },
            "BRG002": { nama: "Sikat Gigi", harga: 12000 },
            "BRG003": { nama: "Pasta Gigi", harga: 20000 },
            "BRG004": { nama: "Shampoo", harga: 25000 },
            "BRG005": { nama: "Handuk", harga: 30000 }
        };

        const kodeSelect = document.getElementById('kode');
        const namaInput = document.getElementById('nama');
        const hargaInput = document.getElementById('harga');

        kodeSelect.addEventListener('change', function() {
            const kode = this.value;
            if (barangData[kode]) {
                namaInput.value = barangData[kode].nama;
                hargaInput.value = barangData[kode].harga;
            } else {
                namaInput.value = "";
                hargaInput.value = "";
            }
        });
    </script>

</body>

</html>

=======

    <!-- HEADER -->
    <header>
        <div class="header-left">
            <div class="logo">PM</div>
            <div class="title">
                <h2>--POLGAN MART--</h2>
                <p>Sistem Penjualan Sederhana</p>
            </div>
        </div>

        <div class="header-right">
            <p><strong>Selamat datang, admin!</strong><br><span>Role: Dosen</span></p>
            <button class="logout-btn" onclick="logout()">Logout</button>
        </div>
    </header>

    <main>
        <from action="dashboard.php" method="POST">
            <label for="kode_barang">Kode Barang</label>
            <input type="text" nama="kode_barang" id="kode_barang" placeholder="Masukkan Kode Barang" required>
            <label for="nama_barang">Nama Barang</label>
            <input type="text" nama="nama_barang" id="nama_barang" placeholder="Masukkan Nama Barang" required>
            <label for="harga_barang">Harga</label>
            <input type="number" nama="harga_barang" id="harga_barang" placeholder="Masukkan Harga" required>
            <label for="nama_barang">Jumlah</label>
            <input type="number" nama="jumlah_barang" id="jumlah_barang" placeholder="Masukkan Jumlah" required>
            <div class="container">
                <input type="submit" value="Tambahkan">
                <input type="reset" value="batal">
            </div>
            </from>


    <h2>Daftar Pembelian</h2>
    <p>Daftar pembelian dibuat secara acak tiap kali halaman dimuat</p>
    <table border="1" cellpadding="10" cellspacing="0">
      <tr>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Harga Barang (Rp)</th>
        <th>Jumlah</th>
        <th>Total (Rp)</th>
      </tr>

    <?php
    for ($i = 0; $i < rand(1, $jumlah); $i++) {
      $id_barang = rand(0, $jumlah);
      $kode_barang = $barang[$id_barang][0];
      $nama_barang = $barang[$id_barang][1];
      $harga_barang = $barang[$id_barang][2];

      $beli = rand(1, 10);
      $total = $harga_barang * $beli;
      $grandtotal += $total;

      
      echo "<tr>";
        echo "<td>" . $kode_barang . "</td>";
        echo "<td>" . $nama_barang . "</td>";
        echo "<td style='text-align:right;'>" . number_format($harga_barang, 0, ',', '.') . "</td>";
        echo "<td style='text-align:center;'>" . $beli . "</td>";
        echo "<td style='text-align:right;'>" . number_format($total, 0, ',', '.') . "</td>";
        echo "</tr>";
    }
    
    ?>
    <tr>
        <td colspan="4" style="text-align:right; padding-right:20px"><strong>Total Belanja</strong></td>
        <td style="text-align:right;"><strong><?php echo number_format($grandtotal, 0, ',', '.'); ?></strong></td>
      </tr>
      <tr>
        <td colspan="4" style="text-align:right; padding-right:20px"><strong>Diskon (5%)</strong></td>
        <td style="text-align:right;"><strong><?php echo number_format($grandtotal, 0, ',', '.'); ?></strong></td>
      </tr>
      <tr>
        <td colspan="4" style="text-align:right; padding-right:20px"><strong>Total </strong></td>
        <td style="text-align:right;"><strong><?php echo number_format($grandtotal- ($grandtotal * 0.05), 0, ',', '.'); ?></strong></td>
      </tr>
    </table>

  </main>
    <script>
        function logout() {
            alert("Anda telah logout!");
            // contoh redirect ke halaman login
            window.location.href = "index.php";
        }
    </script>
</body>
</html>
>>>>>>> 191e39932cd48e9be473b5dd5ed45140b1d28aca
