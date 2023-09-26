<?php
    $mahasiswa = [
        ["Ujang", "1124141", "Teknik Mesin", "ujang@gmail.com"],
        ["Rizki", "1221412", "Teknik Informatika", "rizki@gmail.com"],
        ["Hasan", "1364366", "Teknik Industri", "hasan@gmail.com"]
    ]
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Array</title>
</head>
<body>
    <h1>Daftar Siswa</h1>
    <?php foreach ($mahasiswa as $mhs) : ?>
        <ul>
            <li>Nama : <?= $mhs[0]; ?></li>
            <li>NRP : <?= $mhs[1]; ?></li>
            <li>Jurusan : <?= $mhs[2]; ?></li>
            <li>Email : <?= $mhs[3]; ?></li>
        </ul>
        
    <?php endforeach; ?>
</body>
</html>