<?php
// Mengambil data dari form HTML
$nama_user = $_POST['nama_user'];
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

// Query SQL untuk memeriksa apakah nama pengguna sudah ada dalam database
$cek_user_sql = "SELECT * FROM registration WHERE nama_user='$nama_user'";
$result_user = $conn->query($cek_user_sql);

if ($result_user->num_rows > 0) {
    // Nama pengguna sudah ada dalam database, tampilkan pesan kesalahan
    echo "Username is already in use. Please try another username.";
} else {
    // Nama pengguna belum ada dalam database, simpan informasi pendaftaran
    $insert_sql = "INSERT INTO registration (nama_user, email_user, pass_user) VALUES ('$nama_user', '$email_user', '$pass_user')";
    
    if ($conn->query($insert_sql) === TRUE) {
        echo "Registration successful. Please log in.";
    } else {
        echo "Error: " . $insert_sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi ke database
$conn->close();
?>
