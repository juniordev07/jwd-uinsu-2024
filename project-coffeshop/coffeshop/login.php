<?php
session_start();
include_once 'includes/db.php';

$errors = [];
$username = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Validasi
    if (empty($username)) {
        $errors['username'] = 'Username is required';
    }

    if (empty($password)) {
        $errors['password'] = 'Password is required';
    }

    // Jika tidak ada error, cek login
    if (empty($errors)) {
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                header('Location: index.php');
                exit();
            } else {
                $errors['login_fail'] = 'Wrong username or password';
            }
        } else {
            $errors['login_fail'] = 'Wrong username or password';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

    <h2>Silahkan Login!</h2>
        <form action="login.php" method="POST" class="form">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" required>
                <p class="error"><?php echo isset($errors['username']) ? $errors['username'] : ''; ?></p>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <p class="error"><?php echo isset($errors['password']) ? $errors['password'] : ''; ?></p>
            </div>
            <button type="submit">Login</button>
            <?php if (isset($errors['login_fail'])): ?>
                <p class="error"><?php echo $errors['login_fail']; ?></p>
            <?php endif; ?>
        </form>
</main>
    <footer>
    <p>&copy; 2024 Coffeeshop - Finzz | JWD - UINSU Medan.</p>
    </footer>
</body>
</html>
