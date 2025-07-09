<?php
session_start();
include 'db.php';

// Check and validate the table ID
if (isset($_GET['table']) && is_numeric($_GET['table'])) {
    $_SESSION['table_id'] = intval($_GET['table']);
}

if (!isset($_SESSION['table_id'])) {
    die("Error: Invalid access. Please scan the QR code on your table.");
}

$table_id = $_SESSION['table_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Smart Restaurant - Order</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="card shadow-lg p-4">
      <h2 class="text-center text-primary">Ordering from Table <?= $table_id ?></h2>
      <form method="POST" action="place_order.php">
        <!-- Optional hidden field in case session is lost -->
        <input type="hidden" name="table_id" value="<?= $table_id ?>">

        <div class="form-check mb-2">
          <input class="form-check-input" type="checkbox" name="items[]" value="Pizza" id="pizza">
          <label class="form-check-label" for="pizza">Pizza</label>
        </div>
        <div class="form-check mb-2">
          <input class="form-check-input" type="checkbox" name="items[]" value="Burger" id="burger">
          <label class="form-check-label" for="burger">Burger</label>
        </div>
        <div class="form-check mb-3">
          <input class="form-check-input" type="checkbox" name="items[]" value="Coke" id="coke">
          <label class="form-check-label" for="coke">Coke</label>
        </div>

        <button class="btn btn-primary w-100" type="submit">Place Order</button>
      </form>
    </div>
  </div>
</body>
</html>
