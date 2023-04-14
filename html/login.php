<?php
// Start session
session_start();

// Check if admin is already logged in
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in']) {
    header('Location: inventory.php');
    exit;
}

// Check if login form is submitted
if (isset($_POST['login'])) {
    // Check admin credentials
    $username = 'admin';
    $password = 'password';

    if ($_POST['username'] == $username && $_POST['password'] == $password) {
        // Set admin logged in session variable
        $_SESSION['admin_logged_in'] = true;
        header('Location: inventory.php');
        exit;
    } else {
        $error = 'Invalid username or password';
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Login</title>
</head>

<body>
    <h2>Admin Login</h2>
    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    <form method="post">
        <div>
            <label>Username:</label>
            <input type="text" name="username">
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="password">
        </div>
        <input type="submit" name="login" value="Login">
    </form>
</body>

</html>