<?php
include_once '../includes/db.php';

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Coffeeshop</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
        <header>
        <img src="../images/header.jpg" alt="" width="100%" >
            <nav>
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="products.php">Products</a></li>
                        <li><a href="../pesan.php">Pesan</a></li>
                        <li><a href="../daftar.php">Daftar Pesanan</a></li>
                        <li><a href="../about.php">About</a></li>
                        <li><a href="../contact.php">Hubungi Kami</a></li>
                        <?php if (isset($_SESSION['username'])): ?>
                        <li><a href="../logout.php">Logout</a></li>
                    <?php else: ?>
                        <li><a href="../login.php">Login</a></li>
                        <li><a href="../register.php">Register</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </header>
    </div>
 
    <main>
        <h2>Our Products</h2>
        <ul>
            <?php while($row = $result->fetch_assoc()): ?>
                <li>
                    <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                    <p><?php echo htmlspecialchars($row['description']); ?></p>
                    <p>$<?php echo htmlspecialchars($row['price']); ?></p>
                    <a href="product_detail.php?id=<?php echo $row['id']; ?>">View Details</a>
                </li>
            <?php endwhile; ?>
        </ul>
    </main>
    <footer>
    <p>&copy; 2024 Coffeeshop - Finzz | JWD - UINSU Medan.</p>
    </footer>
</body>
</html>
