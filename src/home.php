<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: signin.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Store - Inicio</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, sans-serif;
        }

        body{
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
            background:linear-gradient(135deg,#4f46e5,#7c3aed);
        }

        .home-box{
            width:450px;
            background:white;
            padding:40px;
            border-radius:20px;
            box-shadow:0 10px 30px rgba(0,0,0,0.2);
            text-align:center;
        }

        .home-box h1{
            color:#333;
            margin-bottom:15px;
            font-size:28px;
        }

        .home-box p{
            color:#666;
            margin-bottom:30px;
            font-size:16px;
        }

        .btn{
            display:block;
            width:100%;
            padding:12px;
            margin-top:10px;
            color:white;
            text-decoration:none;
            border-radius:10px;
            font-size:16px;
            font-weight:bold;
            transition:0.3s;
        }

        .btn-users{
            background:#2563eb;
        }

        .btn-users:hover{
            background:#1d4ed8;
            transform:translateY(-2px);
        }

        .btn-logout{
            background:#ef4444;
        }

        .btn-logout:hover{
            background:#dc2626;
            transform:translateY(-2px);
        }
    </style>
</head>
<body>

    <div class="home-box">

        <h1>Welcome to Main Store</h1>

        <p>Has iniciado sesión correctamente en el sistema.</p>

        <a href="list_users.php" class="btn btn-users">
            List Users
        </a>

        <a href="logout.php" class="btn btn-logout">
            Cerrar Sesión
        </a>

    </div>

</body> 