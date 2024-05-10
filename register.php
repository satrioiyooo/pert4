<?php

// Memuat file functions.php yang berisi definisi fungsi-fungsi yang dibutuhkan
require 'functions.php';

// Memeriksa apakah data yang dikirimkan melalui metode POST mengandung elemen bernama "signup"
if (isset($_POST["signup"])) {

    // Jika ada, maka memanggil fungsi registrasi() dengan data yang dikirimkan melalui POST
    if (registrasi($_POST) > 0) {
        // Jika pendaftaran berhasil, tampilkan alert JavaScript dengan pesan "user baru berhasil ditambahkan"
        echo "<script>
        alert('user baru berhasil ditambahkan');
        </script>";
    } else {
        // Jika pendaftaran gagal, tampilkan pesan kesalahan yang dikirimkan oleh MySQL
        echo mysqli_error($conn);
    }
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

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <!-- Menambahkan fungsi validasi ke dalam atribut onsubmit pada tag form -->
                        <form method="POST" class="register-form" id="register-form" onsubmit="return validateForm()">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="index.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
    </div>




    <!-- Menggunakan JavaScript untuk validasi formulir sebelum pengiriman -->
<script>
    // Fungsi untuk memvalidasi formulir sebelum pengiriman
    function validateForm() {
        // Mengambil nilai dari setiap input
        var name = document.getElementById("name").value;
        var email = document.getElementById("email").value;
        var pass = document.getElementById("pass").value;
        var re_pass = document.getElementById("re_pass").value;

        // Memeriksa apakah ada input yang kosong
        if (name.trim() === '' || email.trim() === '' || pass.trim() === '' || re_pass.trim() === '') {
            // Jika ada input yang kosong, tampilkan pesan kesalahan
            alert('Semua kolom harus diisi!');
            // Mencegah pengiriman formulir
            return false;
        }
    }
</script>



    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
