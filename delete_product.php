<!DOCTYPE html>
<html>
<head>
    <title>Delete Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'db.php'; ?>

<?php
$id = $_GET['id'];

$conn->query("DELETE FROM products WHERE id=$id");

header("Location: view_products.php");
?>