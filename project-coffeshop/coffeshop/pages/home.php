<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Coffeeshop</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Welcome to Coffeeshop</h1>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <?php if (isset($_SESSION['username'])): ?>
                    <li><a href="../logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="../pesan.php">Pesan</a></li>
                    <li><a href="../daftar.php">Daftar Pesanan</a></li>
                    <li><a href="../login.php">Login</a></li>
                    <li><a href="../register.php">Register</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Hi Member Baru!</h2>
        <p>Gas aja kopi</p>
        
        <h3>Featured Products</h3>
        <div class="featured-products">
            <?php
            include_once '../includes/db.php';

            $sql = "SELECT * FROM products LIMIT 3";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()): ?>
                    <div class="product">
                        <h4><?php echo htmlspecialchars($row['name']); ?></h4>
                        <p><?php echo htmlspecialchars($row['description']); ?></p>
                        <p>$<?php echo htmlspecialchars($row['price']); ?></p>
                        <a href="product_detail.php?id=<?php echo $row['id']; ?>">View Details</a>
                    </div>
                <?php endwhile;
            } else {
                echo "<p>No products found</p>";
            }
            ?>
        </div>
    </main>
    <footer>
    <p>&copy; 2024 Coffeeshop - Finzz | JWD - UINSU Medan.</p>
    </footer>
</body>
</html>
