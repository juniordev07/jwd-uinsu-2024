<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Coffeeshop</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header>
        <img src="images/header.jpg" alt="" width="100%" >
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="pages/products.php">Products</a></li>
                    <?php if (isset($_SESSION['username'])): ?>
                        <li><a href="logout.php">Logout</a></li>
                    <?php else: ?>
                        <li><a href="about.php">About</a></li>
                        <!-- <li><a href="pesan.php">Pesan</a></li>
                        <li><a href="daftar.php">Daftar Pesanan</a></li> -->
                        <li><a href="login.php">Login</a></li>
                        <li><a href="register.php">Register</a></li>
                        <li><a href="contact.php">Hubungi Kami</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </header>
    </div>
        <main>
            <h2>Selamat Datang Di Coffeshop Terbaik !!</h2>
            <p>Walaupun kalian gabut kuyy ngopii!!</p>
        </main>
        <footer>
            <p>&copy; 2024 Coffeeshop - Finzz | JWD - UINSU Medan.</p>
        </footer>
</body>
</html>
