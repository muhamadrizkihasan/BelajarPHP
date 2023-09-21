<?php
    function salam($waktu = "Datang", $nama = "Admin") {
        return "Selamat $waktu, $nama!";
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Function</title>
</head>
<body>
    <p>Sekarang adalah: <?php echo date("l, d M Y ");  ?></p>
    <p>100 hari kemudian adalah hari: <?php echo date("l", time()+60*60*24*100); ?> </p>
    <h1><?= salam("Pagi", "Hasan"); ?></h1>
</body>
</html>