<?php
    session_start();
    require 'functions.php';

    // Cek cookie
    if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
        $id = $_COOKIE['id'];
        $key = $_COOKIE['key'];

        // Ambil username berdasarkan id
        $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
        $row = mysqli_fetch_assoc($result);

        // Cek cookie dan username
        if( $key === hash('sha256', $row['username']) ) {
            $_SESSION['login'] = true;
        }
    }

    if( isset($_SESSION["login"]) ) {
        header("Location: index.php");
        exit;
    }

    if( isset($_POST["login"]) ) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

        // Cek username
        if( mysqli_num_rows($result) === 1 ) {
            // Cek password
            $row = mysqli_fetch_assoc($result);
            if( password_verify($password, $row["password"]) ) {
                // Cek session
                $_SESSION["login"] = true;

                // Cek remember me
                if( isset($_POST['remember']) ) {
                    // Buat cookie
                    setcookie('id', $row['id'], time()+60);
                    setcookie('key', hash('sha256', $row['username']), time()+60);
                }

                header("Location: index.php");
                exit;
            }
        }
        $error = true;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Halaman Login</title>
</head>
<body>
    <div class="container-sm">
            <div class="position-absolute top-50 start-50 translate-middle">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h3>Halaman Login</h3>
                            <?php if( isset($error) ) : ?>
                                <p style="color: red; font-style: italic;">Username / Password salah</p>
                            <?php endif; ?>        
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
                                <input type="checkbox" class="form-label" name="remember" id="remember">
                                <label for="remember" lass="form-control">Remember me</label>
                            </div>                        
                                <button type="submit" name="login" class="btn btn-primary">Login</button>
                        </form>
                    <br>
                    <a href="registrasi.php">Buat Akun</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>