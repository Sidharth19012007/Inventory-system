<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
<title>View Products</title>
<link rel="stylesheet" href="style.css">
<script src="script.js"></script>
</head>
<body>

<div class="header">Product List</div>

<p id="datetime" style="text-align:center;"></p>

<div style="text-align:center;">
<input type="text" id="search" placeholder="Search..." onkeyup="searchProduct()">
</div>

<div style="text-align:center;">
<a href="add_product.php" class="btn">Back</a>
<a href="index.php" class="btn">Home</a>
<a href="?sort=price" class="btn">Sort Price</a>
<a href="?sort=quantity" class="btn">Sort Quantity</a>
<a href="export.php" class="btn">Export</a>
</div>

<table>
<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Price</th>
<th>Qty</th>
<th>Category</th>
<th>Date</th>
<th>Total</th>
<th>Action</th>
</tr>
</thead>

<tbody>
<?php
$order="id";

if(isset($_GET['sort'])){
    if($_GET['sort']=="price") $order="price";
    if($_GET['sort']=="quantity") $order="quantity";
}

$result=$conn->query("SELECT * FROM products ORDER BY $order");

while($row=$result->fetch_assoc()){
?>
<tr>
<td><?= $row['id'] ?></td>
<td><?= $row['name'] ?></td>
<td><?= $row['price'] ?></td>
<td><?= $row['quantity'] ?></td>
<td><?= $row['category'] ?></td>
<td><?= $row['created_at'] ?></td>
<td><?= $row['price']*$row['quantity'] ?></td>
<td>
<a href="edit_product.php?id=<?= $row['id'] ?>" class="btn">Edit</a>
<a href="delete_product.php?id=<?= $row['id'] ?>" class="btn" onclick="return confirmDelete()">Delete</a>
</td>
</tr>
<?php } ?>
</tbody>
</table>

<div style="text-align:center;">
<button onclick="scrollToTop()" class="btn">⬆ Top</button>
</div>

</body>
</html>