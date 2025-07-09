<?php
$table_id = "T1"; // optional placeholder
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Smart Restaurant - Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      background: #f9f9f9;
    }
    .navbar-brand {
      font-weight: bold;
      font-size: 1.5rem;
    }
    .hero {
      background: url('https://images.unsplash.com/photo-1600891963935-cbe0ecf9ebaa') center/cover no-repeat;
      height: 400px;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      text-shadow: 2px 2px 8px #000;
    }
    .category-card img {
      height: 180px;
      object-fit: cover;
      border-radius: 10px;
    }
    .footer {
      background: #343a40;
      color: white;
      padding: 20px 0;
    }
  </style>
</head>
<body>

<!-- 🔹 Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Smart Restaurant</a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div id="navbarNav" class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#menu">Menu</a></li>
        <li class="nav-item"><a class="nav-link" href="#order">Order Now</a></li>
        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- 🔹 Hero Section -->
<div class="hero text-center">
  <div>
    <h1 class="display-4 fw-bold">Welcome to Smart Restaurant</h1>
    <p class="lead">Order your favorite food with just a few taps</p>
  </div>
</div>

<!-- 🔹 Categories / Menu -->
<section id="menu" class="container py-5">
  <h2 class="text-center mb-4">Select Your Items</h2>
  <form id="orderForm">
    <div class="row g-4">

      <!-- Meal -->
      <div class="col-md-4">
        <div class="card category-card shadow">
          <img src="https://source.unsplash.com/400x300/?thali,meal" class="card-img-top" alt="Meal">
          <div class="card-body text-center">
            <h5 class="card-title">Veg Meal</h5>
            <p class="card-text">₹150</p>
            <input type="checkbox" class="form-check-input item" data-price="150" name="items[]" value="Veg Meal" id="meal1"> Select
          </div>
        </div>
      </div>

      <!-- Snacks -->
      <div class="col-md-4">
        <div class="card category-card shadow">
          <img src="https://source.unsplash.com/400x300/?samosa,snacks" class="card-img-top" alt="Snacks">
          <div class="card-body text-center">
            <h5 class="card-title">Samosa</h5>
            <p class="card-text">₹30</p>
            <input type="checkbox" class="form-check-input item" data-price="30" name="items[]" value="Samosa" id="snack1"> Select
          </div>
        </div>
      </div>

      <!-- Drinks -->
      <div class="col-md-4">
        <div class="card category-card shadow">
          <img src="https://source.unsplash.com/400x300/?juice,drink" class="card-img-top" alt="Drinks">
          <div class="card-body text-center">
            <h5 class="card-title">Mango Juice</h5>
            <p class="card-text">₹40</p>
            <input type="checkbox" class="form-check-input item" data-price="40" name="items[]" value="Mango Juice" id="drink1"> Select
          </div>
        </div>
      </div>
    </div>

    <!-- 🔹 Bill Summary -->
    <div class="mt-5">
      <h4 class="text-center mb-3">Your Bill</h4>
      <p class="text-center fs-5">Total Amount: ₹<span id="totalAmount">0</span></p>

      <!-- 🔹 Payment Details -->
      <div class="text-center mb-4">
        <p>Choose your payment method:</p>
        <select class="form-select w-50 mx-auto mb-3">
          <option selected disabled>Select Payment Option</option>
          <option value="cash">Cash</option>
          <option value="upi">UPI</option>
          <option value="card">Credit/Debit Card</option>
        </select>
        <button type="submit" class="btn btn-success btn-lg"><i class="fa-solid fa-paper-plane me-2"></i>Place Order</button>
      </div>
    </div>
  </form>
</section>

<!-- 🔹 Order Section -->
<section id="order" class="container text-center py-5">
  <h2 class="mb-3">Thank You!</h2>
  <p>Enjoy your meal at Table <?= $table_id ?>!</p>
</section>

<!-- 🔹 Footer -->
<footer class="footer text-center">
  <div class="container">
    <p class="mb-0">&copy; <?= date("Y") ?> Smart Restaurant. All rights reserved.</p>
  </div>
</footer>

<!-- Bootstrap JS + Price Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const checkboxes = document.querySelectorAll('.item');
  const totalEl = document.getElementById('totalAmount');

  checkboxes.forEach(box => {
    box.addEventListener('change', () => {
      let total = 0;
      checkboxes.forEach(i => {
        if (i.checked) total += parseInt(i.dataset.price);
      });
      totalEl.innerText = total;
    });
  });

  document.getElementById('orderForm').addEventListener('submit', function(e) {
    e.preventDefault();
    alert("Order placed! Please proceed to the counter for payment.");
    location.reload();
  });
</script>

</body>
</html>
