<?php
include_once 'includes/db.php';

$errors = [];
$username = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    // Validasi
    if (empty($username)) {
        $errors['username'] = 'Username is required';
    }

    if (empty($email)) {
        $errors['email'] = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format';
    }

    if (empty($password)) {
        $errors['password'] = 'Password is required';
    } elseif (strlen($password) < 6) {
        $errors['password'] = 'Password must be at least 6 characters';
    } elseif ($password != $password_confirm) {
        $errors['password_confirm'] = 'Passwords do not match';
    }

    // Jika tidak ada error, insert ke database
    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sss', $username, $email, $hashed_password);

        if ($stmt->execute()) {
            header('Location: login.php');
            exit();
        } else {
            $errors['db_error'] = 'Database error: failed to register';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
    <h2>Silahkan Registrasi!</h2>
        <form action="register.php" method="POST" class="form">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" required>
                <p class="error"><?php echo isset($errors['username']) ? $errors['username'] : ''; ?></p>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
                <p class="error"><?php echo isset($errors['email']) ? $errors['email'] : ''; ?></p>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <p class="error"><?php echo isset($errors['password']) ? $errors['password'] : ''; ?></p>
            </div>
            <div class="form-group">
                <label for="password_confirm">Confirm Password</label>
                <input type="password" id="password_confirm" name="password_confirm" required>
                <p class="error"><?php echo isset($errors['password_confirm']) ? $errors['password_confirm'] : ''; ?></p>
            </div>
            <button type="submit">Register</button>
            <?php if (isset($errors['db_error'])): ?>
                <p class="error"><?php echo $errors['db_error']; ?></p>
            <?php endif; ?>
        </form>
    </main>
    <footer>
    <p>&copy; 2024 Coffeeshop - Finzz | JWD - UINSU Medan.</p>
    </footer>
</body>
</html>
