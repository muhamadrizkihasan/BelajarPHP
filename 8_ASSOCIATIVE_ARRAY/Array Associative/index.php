<?php
    $mahasiswa = [
        [
            "nrp" => "12411514",
            "nama" =>"Rizki",
            "email" =>"rizki@gmail.com",
            "jurusan" => "Teknik Informatika",
            "gambar" => "kiki.png"
        ],
        [
            "nrp" => "12411515",
            "nama" =>"Hasan",
            "email" =>"hasan@gmail.com",
            "jurusan" => "Teknik Industri",
            "gambar" => "kiki.png"
        ]
    ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <h3>Daftar Mahasiswa</h3>
        <?php foreach( $mahasiswa as $mhs ) : ?>
            <ul>
                <li>
                    <img src="img/<?= $mhs["gambar"]; ?>">
                </li>
                <li>Nama : <?= $mhs["nama"]; ?></li>
                <li>NRP : <?= $mhs["nrp"]; ?></li>
                <li>Jurusan : <?= $mhs["jurusan"]; ?></li>
                <li>Email : <?= $mhs["email"]; ?></li>
            </ul>      
        <?php endforeach; ?>
</body>
</html>