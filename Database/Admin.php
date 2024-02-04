<?php
// Konfigurasi koneksi ke database MySQL
$host = "localhost"; // Gantilah dengan host database Anda
$username = "root"; // Gantilah dengan username database Anda
$password = ""; // Gantilah dengan password database Anda
$database = "database_user"; // Gantilah dengan nama database Anda

// Membuat koneksi ke database
$conn = new mysqli($host, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Query SQL untuk mengambil data dari database
$sql = "SELECT * FROM registration";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['nama_user'] . "</td>";
        echo "<td>" . $row['email_user'] . "</td>";
        echo "<td>" . $row['pass_user'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "Tidak ada data pengguna.";
}

// Menutup koneksi ke database
$conn->close();
?>
