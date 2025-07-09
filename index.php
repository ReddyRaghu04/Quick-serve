<?php
// No session or QR logic
$table_id = "T1"; // Optional: set default/fake table ID
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
      <h2 class="text-center text-primary">Smart Restaurant - Place Your Order</h2>
      <form method="POST" action="place_order.php">
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

        <!-- Optional: hidden field if you still want table info -->
        <input type="hidden" name="table_id" value="<?= $table_id ?>">

        <button class="btn btn-primary w-100" type="submit">Place Order</button>
      </form>
    </div>
  </div>
</body>
</html>
