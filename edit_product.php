<?php include 'db.php'; ?>

<?php
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM products WHERE id=$id");
$row = $result->fetch_assoc();

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $category = $_POST['category'];

    $conn->query("UPDATE products SET 
        name='$name',
        price='$price',
        quantity='$quantity',
        category='$category'
        WHERE id=$id");

    header("Location: view_products.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Product</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="header">Edit Product</div>

<div class="edit-container">
<div class="edit-card">

<h3>Update Product</h3>

<form method="POST">
    <input type="text" name="name" value="<?= $row['name'] ?>"><br>
    <input type="number" name="price" value="<?= $row['price'] ?>"><br>
    <input type="number" name="quantity" value="<?= $row['quantity'] ?>"><br>
    <input type="text" name="category" value="<?= $row['category'] ?>"><br>

    <button name="update" class="btn">Update</button>
</form>

<br>

<a href="view_products.php" class="btn">⬅ Back</a>

</div>
</div>

</body>
</html>