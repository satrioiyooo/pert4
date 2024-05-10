<?php
//melakukan koneksi dengan database
$conn = mysqli_connect("localhost",    "root",          "",          "user");
                        //nama host  //username mysql  //password mysql  //nama database //password
// Fungsi untuk registrasi
function registrasi($data) {
    global $conn;

    $username = $data["name"];
    $email = $data["email"];
    $password = mysqli_real_escape_string($conn, $data["pass"]);
    $re_pass = mysqli_real_escape_string($conn, $data["re_pass"]);

    //periksa email sudah ada atau belum
    $result = mysqli_query($conn, "SELECT email FROM data_user WHERE email= '$email'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>alert('Email sudah terdaftar!');</script>";
        return false;
    }

    // Periksa kesesuaian password
    if ($password !== $re_pass) {
        echo "<script>alert('Password tidak sesuai!');</script>";
        return false;
    }
    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan userbaru ke database
    $query = "INSERT INTO data_user (username, email, password) VALUES ('$username', '$email', '$password')";
    mysqli_query($conn, $query);

    //menghasilkan +1 jika berhasil dan -1 jika gagal
    return mysqli_affected_rows($conn);
}
?>
