<?php
    session_start();
    if( !isset($_SESSION["login"]) ) {
        header("Location: login.php");
        exit;
    }

    require 'functions.php';
    $mahasiswa = query("SELECT * FROM mahasiswa");

    // Tombol cari ditekan
    if( isset($_POST["cari"]) ) {
        $mahasiswa = cari($_POST["keyword"]);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Halaman Admin</title>
</head>
<body>
    <a href="logout.php" class="logout">Logout</a>
    <h3>Daftar Mahasiswa</h3>
    <a href="tambah.php" class="tampah">Tambah Data Mahasiswa</a>
    <br><br>

    <form action="" method="post" enctype="multipsrt/form-data" class="form-cari">

        <input type="text" name="keyword" size="40" autofocus 
        placeholder="Masukan keyword pencarian..." autocomplete="off" id="keyword">
        <button type="submit" name="cari" id="tombol-cari">Cari!</button>

        <img src="img/loader.gif" class="loader">

    </form>
    <br>

    <div id="container">
        <table border="1" cellpadding="10" cellspacing"0">
            <tr>
                <th>No</th>
                <th class="aksi">Aksi</th>
                <th>Gambar</th>
                <th>NRP</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
            </tr>
            
            <?php $i = 1; ?>
            <?php foreach ($mahasiswa as $row) : ?> 
                <tr>
                    <td><?= $i; ?></td>
                    <td class="aksi">
                        <a href="ubah.php?id=<?= $row["id"];?>">ubah</a> |
                        <a href="hapus.php?id=<?= $row["id"];?>" onclick="return confirm('yakin?');">hapus</a> 
                    </td>
                    <td><img src="img/<?= $row["gambar"];?>" width="50"></td>
                    <td><?= $row["nrp"];?></td>
                    <td><?= $row["nama"];?></td>
                    <td><?= $row["email"];?></td>
                    <td><?= $row["jurusan"];?></td>
                </tr>
            <?php $i++; ?>
            <?php endforeach; ?>

        </table>
    </div>
    <script src="js/jquery-3.6.3.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>