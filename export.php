<?php

ob_start();

include 'db.php';


header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=products.csv');

$output = fopen("php://output", "w");


fputcsv($output, ['ID', 'Name', 'Price', 'Quantity', 'Category', 'Date']);

$result = $conn->query("SELECT * FROM products");

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, [
            $row['id'],
            $row['name'],
            $row['price'],
            $row['quantity'],
            $row['category'],
            $row['created_at']
        ]);
    }
}


fclose($output);


ob_end_flush();
exit;
?>