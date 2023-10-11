<?php
    // Koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "phpdasar");

        function query($query) {
            global $conn;
            $result = mysqli_query($conn, $query);
            $rows = [];
            while( $row = mysqli_fetch_assoc($result) ) {
                $rows[] = $row;
            }
            return $rows;
        }

        function tambah($data) {
            global $conn;
            $nrp = htmlspecialchars($_POST["nrp"]);
            $nama = htmlspecialchars($_POST["nama"]);
            $email = htmlspecialchars($_POST["email"]);
            $jurusan = htmlspecialchars($_POST["jurusan"]);
            
            // Upload gambar
            $gambar = upload();
            if( !$gambar ) {
                return false;
            }

            $query = "INSERT INTO mahasiswa
                    VALUES
                    ('', '$nrp', '$nama', '$email', '$jurusan', '$gambar')  
                ";
            mysqli_query($conn, $query);

            return mysqli_affected_rows($conn);
        }

        function upload() {
            $namaFile = $_FILES['gambar']['name'];
            $ukuranFile = $_FILES['gambar']['size'];
            $error = $_FILES['gambar']['error'];
            $tmpName = $_FILES['gambar']['tmp_name'];

            // Cek apakah tidak ada gambar yang diupload
            if( $error === 4 ) {
                echo "<script>
                        alert('Pilih gambar terlebih dahulu');
                        </script>";
                return false;
            }

            // Cek apakah yang diupload adalah gambar
            $ekstensiGambarValid = ['jpg ', 'jpeg', 'png'];
            $ekstensiGambar = explode('.', $namaFile);
            $ekstensiGambar = strtolower (end($ekstensiGambar));
            id( in_array($ekstensiGambar, $ekstensiGambarValid));
            if( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
                echo " <script>
                            alert('yang anda upload bukan gambar!');
                        </script>";
                return false;
            }

            // Cek jika ukuranya terlalu besar
            if( $ukuranFile > 1000000 ) {
                echo "<script>
                        alert('Ukuran gambar terlalu gambar!');
                    </script>";
                return false;
            }
            // Lolos pengecekan, gambar siap diupload
            // Generator nama gambar baru
            $namaFileBaru = iniqid();
            $namaFileBaru .= '.';
            $namaFileBaru .= $ekstensiGambar;
            move_uploaded_file($tmpName, 'img/' . $namaFile);
            
            return $namaFile;
        }


        function hapus($id) {
            global $conn;
            mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
            return mysqli_affected_rows($conn);
        }

        function ubah($data) {
            global $conn;
            $id = $data["id"];
            $nrp = htmlspecialchars($_POST["nrp"]);
            $nama = htmlspecialchars($_POST["nama"]);
            $email = htmlspecialchars($_POST["email"]);
            $jurusan = htmlspecialchars($_POST["jurusan"]);
            $gambar = htmlspecialchars($_POST["gambarLama"]);

            // Cek apakah user pilihkomen baru/tidak
            if( $_FILES['gambar']['error'] === 4 ) {
                $gambar = $gambarLama;
            }

            $query = "UPDATE mahasiswa SET
                        nrp = '$nrp',
                        nama = '$nama',
                        email = '$email',
                        jurusan = '$jurusan',
                        gambar = '$gambar'
                    WHERE id = $id
                ";
            mysqli_query($conn, $query);

            return mysqli_affected_rows($conn);
        }

        function cari($keyword) {
            $query = "SELECT * FROM mahasiswa WHERE
                        nama LIKE '%$keyword' OR 
                        nrp LIKE '%$keyword' OR 
                        email LIKE '%$keyword' OR 
                        jurusan LIKE '%$keyword' 
                    ";
            return query($query);
        }

        function registrasi($data) {
            global $conn;

            $username = strtolower(stripslashes($data["username"]));
            $password = mysqli_real_escape_string($conn, $data["password"]);
            $password2 = mysqli_real_escape_string($conn, $data["password2"]);

            // Cek username sudah ada atau belum
            $result = mysqli_Query($conn, "SELECT username FROM user WHERE username = '$username'");

            if( mysqli_fetch_assoc($result) ) {
                echo "<script>
                        alert('Username sudah terdaftar!')
                    </script>";
                return false;
            }

            // Cek konfirmasi password
            if( $password !== $password2 ) {
                echo "<script>
                        alert('Konfirmasi password tidak sesuai');
                    </script>";
                return false;
            }
            // Enkripsi password
            $password = password_hash($password, PASSWORD_DEFAULT);

            // Tambahkan userbaru ke database
            mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

            return mysqli_affected_rows($conn);
        }
?>