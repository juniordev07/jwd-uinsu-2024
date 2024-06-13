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
        <h2>Contact Us</h2>
        <section class="contact-section">
            <form action="process_contact.php" method="post">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <input type="text" id="subject" name="subject" required>
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn">Send Message</button>
            </form>
        </section>
    </main>
        <footer>
            <p>&copy; 2024 Coffeeshop - Finzz | JWD - UINSU Medan.</p>
        </footer>
</body>
</html>
