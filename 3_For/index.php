<?php
    /*
        $i = 0;
        while( $i < 5 ){
            echo "Hello World! <br>";
            $i++;
        }
    */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel</title>
    <style>
        .warna-baris {
            background-color: silver;
        }
    </style>
</head>
<body>
        <h1>Tabel Menggunakan for Biasa</h1>
            <table border="1" cellpadding="10" cellspacing="0">
                <?php for($i = 1; $i <= 5; $i++) : ?>
                    <?php if($i % 2 == 0) : ?>
                        <tr class="warna-baris">
                    <?php else : ?>
                        <tr>
                    <?php endif; ?>
                            <?php for($j = 1; $j <= 5; $j++) : ?>
                                <td><?= "$i, $j"; ?></td>
                            <?php endfor; ?>
                        </tr>
                <?php endfor; ?>
            </table>

        <h1>Tabel Menggunakan for Template</h1>
        <table border="1" cellpadding="10" cellspacing="0">
                <?php for($i = 1; $i <= 5; $i++) { ?>
                    <?php if($i % 2 == 1) : ?>
                        <tr class="warna-baris">
                    <?php else : ?>
                        <tr>
                    <?php endif; ?>
                        <?php for($j = 1; $j <= 5; $j++) { ?>
                            <td><?php echo "$i, $j"; ?></td>
                        <?php } ?>
                    </tr>
                <?php } ?>
</body>
</html>

