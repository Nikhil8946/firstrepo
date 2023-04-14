<?php
// Start session
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header('Location: login.php');
    exit;
}

// Check if product form is submitted
if (isset($_POST['add_product'])) {
    // Validate input fields
    $name = trim($_POST['name']);
    $price = floatval($_POST['price']);
    $category = trim($_POST['category']);

    if (empty($name) || empty($price) || empty($category)) {
        $error = 'Please fill in all fields';
    } else {
        // Connect to database
        $db_host = 'localhost';
        $db_username = 'nikhil';
        $db_password = 'Nikhil@123';
        $db_name = 'innoraft_groceries';
        $db_conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

        if (!$db_conn) {
            die('Database connection failed: ' . mysqli_connect_error());
        }

        // Insert product into database
        $query = "INSERT INTO products (name, price, category) VALUES ('$name', '$price', '$category')";
        $result = mysqli_query($db_conn, $query);

        if ($result) {
            $success = 'Product added successfully';
        } else {
            $error = 'Error adding product: ' . mysqli_error($db_conn);
        }

        // Close database connection
        mysqli_close($db_conn);
    }
}

// Logout functionality
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Product - Innoraft Groceries</title>
</head>

<body>
    <h1>Add Product</h1>

    <?php if (isset($error)) : ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <?php if (isset($success)) : ?>
        <p style="color: green;"><?php echo $success; ?></p>
    <?php endif; ?>

    <form method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br><br>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price"><br><br>

        <label>Category</label>
        <select name="category" required>
            <option value="">Select category</option>
            <option value="healthy">Healthy snacks</option>
            <option value="unhealthy">Unhealthy snacks</option>
        </select>

        <input type="submit" name="add_product" value="Add Product">
    </form>

    <br>

    <a href="?logout=true">Logout</a>

</body>

</html>