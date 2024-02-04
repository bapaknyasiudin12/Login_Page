<?php
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

// Query SQL untuk mengambil data dari tabel
$sql = "SELECT ID, nama_user, email_user, pass_user FROM registration";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="style/style_admin.css"> <!-- Sesuaikan dengan path CSS Anda -->
</head>
<body>
    <div class="container">
        <h1>Admin Page</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama User</th>
                    <th>Email User</th>
                    <th>Password User</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["ID"] . "</td>";
                        echo "<td>" . $row["nama_user"] . "</td>";
                        echo "<td>" . $row["email_user"] . "</td>";
                        echo "<td>" . $row["pass_user"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Tidak ada data.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
// Menutup koneksi ke database
$conn->close();
?>
