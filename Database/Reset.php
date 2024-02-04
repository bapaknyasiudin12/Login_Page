<?php
// Mengambil data dari form HTML
$email_user = $_POST['email_user'];
$new_password = $_POST['new_password'];

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

// Query SQL untuk memeriksa keberadaan pengguna dalam database berdasarkan alamat email
$sql = "SELECT * FROM registration WHERE email_user='$email_user'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // Pengguna ditemukan dalam database, update kata sandi sesuai keinginan pengguna
    $update_sql = "UPDATE registration SET pass_user='$new_password' WHERE email_user='$email_user'";
    if ($conn->query($update_sql) === TRUE) {
        echo "Password reset successfully.";
    } else {
        echo "Error updating password: " . $conn->error;
    }
} else {
    echo "Email not found. Please try again.";
}

// Menutup koneksi ke database
$conn->close();
?>
