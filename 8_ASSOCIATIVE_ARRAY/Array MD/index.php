<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kotak</title>
    <style>
        .kotak {
            width: 30px;
            height: 30px;
            background-color: #BADA55;
            text-align: center;
            line-height: 30px;
            margin: 3px;
            float: left;
            transition: 1s;
        }
        .kotak:hover {
            transform: rotate(360deg);
            border-radius: 50%;
        }
        .clear {
            clear: both;
        }
    </style>
</head>
<body>
    <h3>1.Membuat kotak menggunakan array biasa</h3>
        <?php 
            $angka = [1,2,3,4,5,6,7,8,9];
        ?>
        <?php foreach ($angka as $a) : ?>
            <div class="kotak"><?= $a; ?></div>
        <?php endforeach; ?>
                
    <br><br><br>
                
    <h3>2.Membuat kotak menggunakan array multidimensi</h3>
    
    <?php 
        $nomer = [
            [1,2,3],
            [4,5,6],
            [7,8,9]
        ];
    ?>
        <?php foreach ($nomer as $a) : ?>
            <?php foreach($a as $b) : ?>
                <div class="kotak"><?= $b; ?></div>
            <?php endforeach; ?> 
            <div class="clear"></div>
        <?php endforeach; ?> 
                
</body>
</html>