<?php
// Konfigurasi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pemweb";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengecek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nomor_telpon = $_POST['nomor_telpon'];
    $pesan = $_POST['pesan'];

    // Menyusun SQL query untuk memasukkan data ke tabel kontak
    $sql = "INSERT INTO kontak (nama, email, nomor_telpon, pesan)
            VALUES ('$nama', '$email', '$nomor_telpon', '$pesan')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Data berhasil dikrim');</script>";
} else {
    echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
}
}

// Menutup koneksi
$conn->close();
?>


