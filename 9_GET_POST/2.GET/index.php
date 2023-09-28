<?php
    // Array Associative
    // Definisinya sama seperti array numerik,kecuali
    // key-nya adalah string yang kita buat sendiri

    $mahasiswa = [
        [
            "nama" => "Rizki",
            "nrp" => "1314155",
            "email" => "rizki@gmail.com",
            "jurusan" => "PPLG",
            "gambar" => "ling.jpg"
        ],
        [
            "nama" => "Hasan",
            "nrp" => "1314156",
            "email" => "hasan@gmail.com",
            "jurusan" => "PPLG",
            "gambar" => "gusion.jpg"
        ]
    ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get</title>
</head>
<body>
    <h3>Daftar Siswa</h3>
    <ul>
        <?php foreach($mahasiswa as $mhs) : ?>
            <li>
                <a href="index2.php?nama=<?= $mhs["nama"]; ?> 
                &nrp=<?= $mhs["nrp"]; ?> 
                &email=<?= $mhs["email"]; ?>
                &jurusan=<?= $mhs["jurusan"]; ?>
                &gambar=<?= $mhs["gambar"]; ?>"> <?= $mhs["nama"]; ?> </a>
            </li>
        <?php endforeach; ?>
    </ul>   
</body>
</html>