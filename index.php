<?php
// Memuat file functions.php yang berisi definisi fungsi-fungsi yang dibutuhkan
require 'functions.php';

// Memeriksa apakah data yang dikirimkan melalui metode POST mengandung elemen bernama "signin"
if (isset($_POST["signin"])) {
    // Mendapatkan nilai email dan password yang dikirimkan melalui POST
    $email = $_POST["your_name"];
    $password = $_POST["password"];

    // Mengeksekusi query untuk mengambil data pengguna dari tabel data_user berdasarkan email yang diberikan
    $result = mysqli_query($conn, "SELECT * FROM data_user WHERE email = '$email'");

    // Memeriksa apakah terdapat satu baris data pengguna yang sesuai dengan email yang dimasukkan
    if (mysqli_num_rows($result) === 1) {
    // Jika ada, ambil baris data tersebut
    $row = mysqli_fetch_assoc($result);
    // Memeriksa apakah password yang dimasukkan cocok dengan password yang disimpan di database
    if (password_verify($password, $row["password"])) {
        // Jika cocok, mulai sesi
        session_start();
        // Tetapkan status login pengguna ke true
        $_SESSION['logged_in'] = true;
        // Arahkan pengguna ke halaman home.php
        header("Location: home.php");
        // Hentikan eksekusi skrip
        exit;
    }
}
    // Jika tidak berhasil masuk, tandai bahwa terjadi kesalahan
    $error = true;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" width="150x" alt="sing up image"></figure>
                        <a href="register.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign up</h2>
                        <!-- Menambahkan fungsi validasi ke dalam atribut onsubmit pada tag form -->
                        <form method="POST" class="register-form" id="register-form" onsubmit="return validateForm()">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" name="your_name" id="your_name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password"/>
                            </div>
                            <div>
                            <?php if (isset($error)) : ?>
                                <p style="color: red; font-size: 10px" >username / password salah</p>
                            <?php endif; ?>

                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>


    <!-- JS -->
<!-- Fungsi JavaScript untuk memvalidasi formulir sebelum pengiriman -->
<script>
    function validateForm() {
        // Mengambil nilai dari input username dan password
        var your_name = document.getElementById("your_name").value;
        var password = document.getElementById("password").value;

        // Memeriksa apakah input username dan password tidak kosong
        if (your_name.trim() === '' || password.trim() === '') {
            // Jika salah satu atau kedua input kosong, tampilkan pesan kesalahan
            alert('Username dan password harus diisi!');
            // Mengembalikan nilai false untuk mencegah pengiriman formulir
            return false;
        }
    }
</script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
