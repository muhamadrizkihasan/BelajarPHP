<?php
    session_start();
    if( !isset($_SESSION["login"]) ) {
        header("Location: login.php");
        exit;
    }

    require 'functions.php';

    // Cek apajah tombol submit sudah ditekan/belum
    if( isset($_POST["submit"]) ) {

        // Cek apakah data berhasil di tambahkan/tidak
        if( tambah($_POST) > 0 ) {
            echo "
                <script>
                    alert('data berhasil ditambahkan!');
                    document.location.href = 'index.php';
                </script>
            ";
        } else {
            echo "
            <script>
                    alert('data gagal ditambahkan!');
                    document.location.href = 'index.php';
                </script>
            ";
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
    <title>Tambah Data Mahasiswa</title>
</head>
<body>
    <div class="container-sm">
        <div class="position-absolute top-50 start-50 translate-middle">
            <div class="card" style="width: 22rem;">
                <div class="card-body">
                    <h3>Tambah Data Mahasiswa</h3>    
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="nrp" class="form-label">NRP : </label>
                            <input type="text" class="form-control" name="nrp" id="nrp">
                        </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama : </label>
                                <input type="text" class="form-control" name="nama" id="nama">
                        </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email : </label>
                                <input type="text" class="form-control" name="email" id="email">
                        </div>
                            <div class="mb-3">
                                <label for="jurusan" class="form-label">Jurusan : </label>
                                <input type="text" class="form-control" name="jurusan" id="jurusan">
                        </div>
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Gambar : </label>
                                <input type="file" class="form-control" name="gambar" id="gambar">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="submit" class="btn btn-primary">Tambah Data!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>   
</body>
</html>