<?php
include_once '../includes/db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?> - Coffeeshop</title>
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
        <h2><?php echo htmlspecialchars($product['name']); ?></h2>
        <p><?php echo htmlspecialchars($product['description']); ?></p>
        <p>$<?php echo htmlspecialchars($product['price']); ?></p>
    </main>
    <footer>
    <p>&copy; 2024 Coffeeshop - Finzz | JWD - UINSU Medan.</p>
    </footer>
</body>
</html>
