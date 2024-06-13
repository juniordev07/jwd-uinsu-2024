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
        <h2>About Us</h2>
        <section class="about-section">
            <h3>Our Story</h3>
            <p>Our journey began in 2020, with a small coffee stand in the heart of the city. Our passion for coffee and commitment to quality quickly gained the attention of coffee lovers, and we expanded to become one of the most popular coffee shops in the area.</p>
            
            <h3>Vision & Mission</h3>
            <p><strong>Vision:</strong> To be the leading coffee shop known for its exceptional quality and community-driven approach.</p>
            <p><strong>Mission:</strong> To provide our customers with the highest quality coffee and create a welcoming atmosphere where everyone feels at home.</p>
            
            <h3>Our Values</h3>
            <ul>
                <li><strong>Quality:</strong> We use only the finest ingredients and techniques to ensure our coffee is of the highest quality.</li>
                <li><strong>Community:</strong> We believe in giving back to the community and fostering a sense of togetherness among our customers.</li>
                <li><strong>Sustainability:</strong> We are committed to sustainable practices and strive to minimize our environmental impact.</li>
                <li><strong>Innovation:</strong> We continuously explore new ideas and trends to keep our offerings fresh and exciting.</li>
            </ul>
            
            <h3>Our Team</h3>
            <p>We have a dedicated team of baristas, chefs, and staff who are passionate about coffee and customer service. Each member of our team brings unique skills and expertise, contributing to the warm and welcoming atmosphere of our coffee shop.</p>
        </section>
    </main>
        <footer>
            <p>&copy; 2024 Coffeeshop - Finzz | JWD - UINSU Medan.</p>
        </footer>
</body>
</html>



