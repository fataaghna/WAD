<?php
require_once "config.php"; 

$db = new Database();
$products = $db->getAllProducts();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Product List</h2>
        <a href="add.php" class="add-btn">+ Add New Product</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($products as $product): ?>
            <tr>
            <tr>
                <td><?= $product['id'] ?></td>
                <td><?= $product['name'] ?></td>
                <td><?= $product['category'] ?></td> 
                <td><?= $product['brand'] ?></td> 
                <td>$<?= number_format($product['price'], 2) ?></td>
                <td><?= $product['stock'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $product['id'] ?>" class="edit-btn">Edit</a>
                    <a href="delete.php?id=<?= $product['id'] ?>" class="delete-btn" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
