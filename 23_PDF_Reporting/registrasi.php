<?php
    require 'functions.php';

    if( isset($_POST["register"]) ) {
        if( registrasi($_POST) > 0 ) {
            echo "<script>
                    alert('User baru berhasil ditambahkan!');
                </script>";
        } else {
            echo mysqli_error($conn);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Halaman Registrasi</title>
    <style>
        label {
            display: block;
        }
    </style>
</head>
<body>
    <div class="container-sm">
         <div class="position-absolute top-50 start-50 translate-middle">
            <div class="card" style="width: 22rem;">
                <div class="card-body">
                    <h3>Halaman Registrasi</h3>
                    <form action="" method="post">                                
                            <div class="mb-3">
                                <label for="username" class="form-label">Username : </label>
                                <input type="text" class="form-control" name="username" id="username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password : </label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                            <div class="mb-3">
                                <label for="password2" class="form-label">Konfirmasi Password : </label>
                                <input type="password" class="form-control" name="password2" id="password2">
                            </div>                                                    
                                <button type="submit" name="register" class="btn btn-primary">Login</button>
                        </form>
                    <br>
                    <a href="login.php">Kembali ke halaman login</a>
                </div>
            </div>
        </div>
    </div>  
</body>
</html>