<?php
require_once "config.php";
$db = new Database();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $products = $db->getAllProducts();
    foreach ($products as $p) {
        if ($p['id'] == $id) {
            $product = $p;
            break;
        }
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $category = $_POST['category'];  
    $brand = $_POST['brand'];       
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    if ($db->updateProduct($id, $name, $category, $brand, $price, $stock)) {  
        header("Location: index.php");
        exit(); 
    } else {
        echo "Failed to update product.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <h2>Edit Product</h2>
        <form method="POST">
            <input type="hidden" name="id" value="<?= $product['id'] ?>">

            <label>Name:</label>
            <input type="text" name="name" value="<?= $product['name'] ?>" required><br>

            <label>Category:</label>
            <input type="text" name="category" value="<?= $product['category'] ?>" required><br>

            <label>Brand:</label>
            <input type="text" name="brand" value="<?= $product['brand'] ?>" required><br>

            <label>Price:</label>
            <input type="number" name="price" step="0.01" value="<?= $product['price'] ?>" required><br>

            <label>Stock:</label>
            <input type="number" name="stock" value="<?= $product['stock'] ?>" required><br>

            <button type="submit">Update Product</button>

            <a href="index.php" class="back-btn">Back</a>
        </form>

    </div>
</body>
</html>
