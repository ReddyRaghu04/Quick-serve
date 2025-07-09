
<?php
session_start();
include 'db.php';

// Check if order items are selected
if (!isset($_POST['items']) || count($_POST['items']) == 0) {
    die("Error: No items selected.");
}

// Get table_id from session or fallback from POST
$table_id = $_SESSION['table_id'] ?? ($_POST['table_id'] ?? null);
if (!$table_id) {
    die("Error: Table ID not found.");
}

// Sanitize inputs
$items = implode(", ", array_map('htmlspecialchars', $_POST['items']));
$total_price = count($_POST['items']) * 100;

// Prepare SQL
$sql = "INSERT INTO orders (table_id, items, total_price, status)
        VALUES (?, ?, ?, 'Pending')";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isi", $table_id, $items, $total_price);
$stmt->execute();
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Placed</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-success text-white">
  <div class="container mt-5 text-center">
    <h2>Your order has been placed for Table <?= htmlspecialchars($table_id) ?>!</h2>
    <a class="btn btn-light mt-3" href="order.php?table=<?= htmlspecialchars($table_id) ?>">Back to Menu</a>
  </div>
</body>
</html>
