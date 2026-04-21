<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
<title>Add Product</title>
<link rel="stylesheet" href="style.css">
<script src="script.js"></script>
</head>
<body>

<div class="header">Add Product</div>

<?php
if(isset($_POST['submit'])){
    $sql = "INSERT INTO products (name, price, quantity, category)
            VALUES ('$_POST[name]','$_POST[price]','$_POST[quantity]','$_POST[category]')";

    if($conn->query($sql)){
        echo "<script>alert('Product Added');</script>";
    }
}
?>

<p id="datetime" style="text-align:center;"></p>

<div class="center-page">
<div class="card">

<form method="POST" name="productForm" onsubmit="return validateForm()">
<input type="text" name="name" placeholder="Name"><br>
<input type="number" id="price" name="price" placeholder="Price" oninput="calculateTotal()"><br>
<input type="number" id="quantity" name="quantity" placeholder="Quantity" oninput="calculateTotal()"><br>
<input type="text" name="category" placeholder="Category"><br>

<p>Total: <span id="total">0</span></p>

<button name="submit" class="btn">Add Product</button>
</form>

<a href="view_products.php" class="btn">View</a>
<a href="index.php" class="btn">Home</a>

</div>
</div>

</body>
</html>