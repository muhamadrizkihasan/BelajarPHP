<?php
    // Cek apakah tombol submit sudah ditekan atau belum
    if( isset($_POST["submit"]) ) {
        // Cek username & password
        if( $_POST["username"] == "hasan" && $_POST["password"] == "kiki123") {
            // Jika benar,redirect ke halaman admin
            header("Location: admin.php");
            exit; 
        } else {
            //Jika salah, rampilkan pesan kesalahan
            $error = true;
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
    <title>Login</title>
</head>
<body>
    <div class="container-sm">
        <div class="position-absolute top-50 start-50 translate-middle">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                <h3>Login Admin</h3>
                <?php if( isset($error) ) : ?>
                    <p style="color: red; font-style: itlic;">username / password salah!</p>
                <?php endif; ?>
                    <ul>
                        <form action="" method="post">
                            <li>
                                <label for="username">username</label>
                                <input type="text" name="username" id="username">
                            </li>
                            <li>
                                <label for="password">password</label>
                                <input type="password" name="password" id="password">
                            </li>
                            <li>
                                <button type="submit" name="submit">Login</button>
                            </li>
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </div>  
</body>
</html>