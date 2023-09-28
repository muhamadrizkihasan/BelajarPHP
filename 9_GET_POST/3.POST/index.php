<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST</title>
    <style>
        font{
            color: blue;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        Masukan nama :
        <input type="text" name="nama">
        <br>
        <button type="submit" name="submit">
            kirim!
        </button>
    </form>
    
    <?php if( isset($_POST["submit"]) ) : ?>
        <h3>Hallo, Selamat Datang <font><?= $_POST["nama"]; ?></font></h3>
    <?php endif; ?>
</body>
</html>