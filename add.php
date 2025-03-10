<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "config.php";
$db = new Database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_POST);   
    $name = $_POST['name'];
    $category = $_POST['category'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    if ($db->addProduct($name, $category, $brand, $price, $stock)) {
        header("Location: index.php");
    } else {
        echo "Failed to add product.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <h2>Add New Product</h2>
        <form method="POST">
            <label>Name:</label>
            <input type="text" name="name" required><br>

            <label>Category:</label>
            <input type="text" name="category" required><br>

            <label>Brand:</label>
            <input type="text" name="brand" required><br>

            <label>Price:</label>
            <input type="number" name="price" step="0.01" required><br>

            <label>Stock:</label>
            <input type="number" name="stock" required><br>

            <button type="submit">Add Product</button>

            <a href="index.php" class="back-btn">Back</a>
        </form>

    </div>
</body>
</html>
