<?php
require_once "config.php";
$db = new Database();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $db->deleteProduct($id);

    $result = $db->getConnection()->query("SELECT COUNT(*) AS count FROM products");
    $row = $result->fetch_assoc();
    
    if ($row['count'] == 0) {
        $db->getConnection()->query("ALTER TABLE products AUTO_INCREMENT = 1");
    }

    header("Location: index.php");
    exit();
}

?>
