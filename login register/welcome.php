<?php
session_start();
include_once('connection.php');
// if(isset($_SESSION['name']) && isset($_SESSION['username'] )){

// }
$_SESSION['name'];
$_SESSION['username'];
?>
<!doctype html>
<html lang="en">

<head>
  <title>Welcome Form</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="style.css">
<style>
        body {
            font-family: Arial, sans-serif;
            /* background-color: #f4f4f4; */
            background: url(../img/begron.jpg);
            background-size: cover;
            margin: 0;
            padding: 0;
        }

        .profile-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .container h3{
          margin-top: 25px;
          margin-bottom: 25px;
          font-size: 30px;
        }

        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .profile-header img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #ddd;
        }

        .profile-header h1 {
            margin: 10px 0;
            font-size: 24px;
            color: #333;
        }

        .profile-header p {
            color: #777;
        }

        .profile-details {
            margin: 20px 0;
        }

        .profile-details h2 {
            font-size: 20px;
            color: #333;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .profile-details .info {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .profile-details .info:last-child {
            border-bottom: none;
        }

        .profile-details .info span {
            color: #777;
        }

        .profile-details .info strong {
            color: #333;
        }
        .btn-custom{
          margin-top: 30px;
          margin-bottom: 30px;
          background-color: black;
          color: white;
          width: 70px;
          height: 50px;
        }
        .btn-custom:hover{
          transform: scale(0.9) translateY(-4px);
          border: 2px solid black;
          background: transparent;
          color: black;
          font-weight: bold;
        }
</style>
</head>

<body>
<div class="profile-container">
        <div class="profile-header">
        <div class="container">
        <h3><strong>Welcome To Euphoria Kstore</strong> </h3>
        </div>
            <h1><span><?=$_SESSION['name'];?></span></h1>
        </div>
        <div class="profile-details">
            <h2>Detail Profil</h2>
            <div class="info">
                <span>Nama: </span>
                <strong><span><?=$_SESSION['name'];?></span></strong>
            </div>
            <div class="info">
                <span>Email:</span>
                <strong><span><?=$_SESSION['username'];?></span></strong>
            </div> 
        </div>
        <a href="index.php"><button class="btn-custom" style="width:100% ; border-radius: 30px; font-weight:600;">Log Out</button></a>
        <a href="../index.html"><button class="btn-custom" style="width: 80px ; border-radius: 30px; font-weight:600;">back</button></a>
    </div>
    
</body>

</html>
