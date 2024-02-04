<?php
// Mengambil data dari form HTML
$email_user = $_POST['email_user'];
$pass_user = $_POST['pass_user'];

// Konfigurasi koneksi ke database MySQL
$host = "localhost"; // Ganti dengan host database Anda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$database = "database_user"; // Ganti dengan nama database Anda

// Membuat koneksi ke database
$conn = new mysqli($host, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Query SQL untuk memeriksa keberadaan pengguna dalam database
$sql = "SELECT * FROM registration WHERE email_user='$email_user'";

$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // Pengguna ditemukan dalam database, memeriksa kata sandi
    $row = $result->fetch_assoc();
    if ($row['pass_user'] == $pass_user) {
        // Login berhasil, arahkan ke halaman setelah login
        echo "You have successfully logged in!";
        // header("Location: halaman_setelah_login.html");
        // exit();
    } else {
        // Kata sandi salah, tampilkan pesan kesalahan
        echo "Wrong password. Please try again.";
    }
} else {
    // Pengguna tidak ditemukan dalam database, arahkan ke halaman registrasi
    echo "User not found, Please Sign-Up.";
    // header("Location: halaman_registrasi.html");
    // exit();
}

// Menutup koneksi ke database
$conn->close();
?>
