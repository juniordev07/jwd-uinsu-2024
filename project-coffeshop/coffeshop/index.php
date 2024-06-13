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
                        <li><a href="pesan.php">Pesan</a></li>
                        <li><a href="daftar.php">Daftar Pesanan</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="contact.php">Hubungi Kami</a></li>
                        <?php if (isset($_SESSION['username'])): ?>
                        <li><a href="logout.php">Logout</a></li>
                    <?php else: ?>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="register.php">Register</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </header>
    </div>

    <main>
        <h2>Hallo Kuy Ngopi Bareng</h2>

        <div class="kopi">
            <div class="paket">
                <div class="kartu">
                    <img src="images/mocha-ice.jpg" alt="Mocha Ice" width="100%">
                    <h3>Mocha Hot/Ice</h3>
                    <p>Rasakan Kesegarannya</p>
                    <a href="index.php?page=order_input" class="btn">Pesan Sekarang</a>
                </div>

                <div class="kartu">
                    <img src="images/mocha-ice.jpg" alt="Paket 1" width="100%">
                    <h3>Mocha Hot/Ice</h3>
                    <p>Rasakan Kesegarannya</p>
                    <a href="index.php?page=order_input" class="btn">Pesan Sekarang</a>
                </div>

                <div class="kartu">
                    <img src="images/mocha-ice.jpg" alt="Paket 1" width="100%">
                    <h3>Mocha Hot/Ice</h3>
                    <p>Rasakan Kesegarannya</p>
                    <a href="index.php?page=order_input" class="btn">Pesan Sekarang</a>
                </div>

                <div class="kartu">
                    <img src="images/mocha-ice.jpg" alt="Paket 1" width="100%">
                    <h3>Mocha Hot/Ice</h3>
                    <p>Rasakan Kesegarannya</p>
                    <a href="index.php?page=order_input" class="btn">Pesan Sekarang</a>
                </div>

                <div class="kartu">
                    <img src="images/mocha-ice.jpg" alt="Paket 1" width="100%">
                    <h3>Mocha Hot/Ice</h3>
                    <p>Rasakan Kesegarannya</p>
                    <a href="index.php?page=order_input" class="btn">Pesan Sekarang</a>
                </div>

                <div class="kartu">
                    <img src="images/mocha-ice.jpg" alt="Paket 1" width="100%">
                    <h3>Mocha Hot/Ice</h3>
                    <p>Rasakan Kesegarannya</p>
                    <a href="index.php?page=order_input" class="btn">Pesan Sekarang</a>
                </div>
            </div>
        </div>
    </main>

    <footer>
            <p>&copy; 2024 Coffeeshop - Finzz | JWD - UINSU Medan.</p>
    </footer>
</body>
</html>
