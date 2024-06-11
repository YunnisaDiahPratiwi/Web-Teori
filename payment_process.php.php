<?php
// Konfigurasi database
$servername = "localhost";
$username = "root";
$password = ""; // Kosongkan jika tidak ada password
$dbname = "pemweb"; // Ganti dengan nama database yang telah Anda buat

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengecek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form billing_address
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip_code = $_POST['zip_code'];

    // Mengambil data dari form payment
    $name_on_card = $_POST['name_on_card'];
    $credit_card_number = $_POST['credit_card_number'];
    $exp_month = $_POST['exp_month'];
    $exp_year = $_POST['exp_year'];
    $cvv = $_POST['cvv'];

    // Menyusun SQL query untuk memasukkan data ke tabel billing_address
    $sql_billing = "INSERT INTO billing_address (full_name, email, address, city, state, zip_code)
                    VALUES ('$full_name', '$email', '$address', '$city', '$state', '$zip_code')";

    // Menyusun SQL query untuk memasukkan data ke tabel payment
    $sql_payment = "INSERT INTO payment (name_on_card, credit_card_number, exp_month, exp_year, cvv)
                    VALUES ('$name_on_card', '$credit_card_number', '$exp_month', '$exp_year', '$cvv')";

    // Mengeksekusi query dan memeriksa apakah berhasil
    if ($conn->query($sql_billing) === TRUE && $conn->query($sql_payment) === TRUE) {
        echo "<script>alert('Pembayaran berhasil.');</script>";
    } else {
        echo "<script>alert('Error: " . $sql_billing . "<br>" . $conn->error . "');</script>";
        echo "<script>alert('Error: " . $sql_payment . "<br>" . $conn->error . "');</script>";
    }
}

// Menutup koneksi
$conn->close();
?>
