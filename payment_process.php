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
    $zip_code = $_POST['zip_code'];

    // Mengambil data dari form payment
    $name_on_card = $_POST['name_on_card'];
    $credit_card_number = $_POST['credit_card_number'];
    $exp_month = $_POST['exp_month'];
    $exp_year = $_POST['exp_year'];
    $cvv = $_POST['cvv'];

    // Menyusun SQL query untuk memasukkan data ke tabel billing_address
    $sql_billing = "INSERT INTO billing_address (full_name, email, address, city, zip_code)
                    VALUES ('$full_name', '$email', '$address', '$city', '$zip_code')";

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
    // Redirect untuk mencegah form resubmission
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit();
}


// Menutup koneksi
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="payment.css">
    <style>
        .container1{
        display: flex;
        justify-content: center;
        align-items: center;
        padding:25px;
        min-height: 100px;
         background: linear-gradient(90deg, #000000 60%, #000 40.1%);
    }
    .btn-custom {
      background-color: black;
      color: white;
      width: 70px;
      height: 50px;

    }
    .btn-custom:hover {
      transform: translateY(-4px);
      border: 2px solid white;
      background: transparent;
      color: white;
      font-weight: bold;
    }
    </style>
</head>
<body>

<div class="container">

    <form action="payment_process.php" method="post">

        <div class="row">

            <div class="col">

                <h3 class="title">Data Diri</h3>

                <div class="inputBox">
                    <span>Full Name :</span>
                    <input type="text" name="full_name" placeholder="Anggie Armelia" required>
                </div>
                <div class="inputBox">
                    <span>Email :</span>
                    <input type="email" name="email" placeholder="ncancy@egmail.com" required>
                </div>
                <div class="inputBox">
                    <span>Address :</span>
                    <input type="text" name="address" placeholder="Room - Street - Locality" required>
                </div>
                <div class="inputBox">
                    <span>City :</span>
                    <input type="text" name="city" placeholder="Jakarta" required>
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>Zip Code :</span>
                        <input type="text" name="zip_code" placeholder="123 456" required>
                    </div>
                </div>

            </div>

            <div class="col">

                <h3 class="title">Payment</h3>

                <div class="inputBox">
                    <span>Accepted Card :</span>
                    <img src="img/card_img.png" alt="">
                </div>
                <div class="inputBox">
                    <span>Name on Card :</span>
                    <input type="text" name="name_on_card" placeholder="Mrs. Anggie" required>
                </div>
                <div class="inputBox">
                    <span>Credit Card Number :</span>
                    <input type="number" name="credit_card_number" placeholder="1111-2222-3333-4444" required>
                </div>
                <div class="inputBox">
                    <span>Exp Month :</span>
                    <input type="text" name="exp_month" placeholder="January" required>
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>Exp Year :</span>
                        <input type="number" name="exp_year" placeholder="2022" required>
                    </div>
                    <div class="inputBox">
                        <span>CVV :</span>
                        <input type="text" name="cvv" placeholder="1234" required>
                    </div>
                </div>

            </div>
    
        </div>
        <input type="submit" value="Proceed to Checkout" class="submit-btn">
    </form>
    
</div> 
<div class="container1">
<a href="index.html">
        <button class="btn-custom">Home</button>
    </a>   
    </div>
</body>
</html>
