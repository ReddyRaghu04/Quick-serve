<?php
include 'db.php';

if (!isset($_POST['items']) || trim($_POST['items']) == '') {
    die("Error: No items selected.");
}

$items = htmlspecialchars($_POST['items']);
$total_price = isset($_POST['total']) ? floatval($_POST['total']) : 0;

$sql = "INSERT INTO orders (items, total_price, status) VALUES (?, ?, 'Pending')";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("sd", $items, $total_price);
if (!$stmt->execute()) {
    die("Execute failed: " . $stmt->error);
}

$stmt->close();
$conn->close();

echo "Order Placed";
?>
